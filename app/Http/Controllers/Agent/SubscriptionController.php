<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Stripe;
use App\Mail\SendFormattedMail;
use App\Models\AgentSubscription;
use App\Models\SubscriptionPayment;
use App\Models\SubscriptionPlan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function subscription()
    {
        if (!auth()->check() || (auth()->user()?->role ?? '') !== 'agent' || (auth()->user()?->status ?? '') !== 'active') {
            return redirect()->route('index')->with('error', 'You do not have permission to view this page.');
        }
        if (!empty(auth()->user()->subscription) && is_expired(auth()->user()->subscription->subscription_end_date) == 0) {
            return redirect()->route('index')->with('error', 'You already have active subscription.');
        }
        $plans = SubscriptionPlan::orderBy('id', 'ASC')->get();
        return view('frontend.agent.subscribe', compact('plans'));
    }

    public function createPayment(Request $request)
    {
        if (!auth()->check() || auth()->user()?->role != 'agent') {
            return response()->json(['success' => 0, 'msg' => 'You don\'t have permission.']);
        }
        $validator = Validator::make($request->all(), [
            'plan_id' => ['required', 'exists:subscription_plans,id']
        ]);
        if ($validator->fails()) {
            $html = '';
            foreach ($validator->errors()->keys() as $fieldKey) {
                $html .= $validator->errors()->first($fieldKey) . '<br>';
            }
            return response()->json(['success' => 0, 'msg' => $html]);
        }
        DB::beginTransaction();
        try {
            $authUser = auth()->user();
            if (!empty($authUser->subscription) && is_expired($authUser->subscription->subscription_end_date) == 0) {
                return response()->json(['success' => 0, 'msg' => 'You already have an active subscription.']);
            }
            $planDetails = SubscriptionPlan::find($request->plan_id);
            if ($planDetails->price < .5) {
                return response()->json(['success' => 0, 'msg' => 'Amount should not be less than 50 cent']);
            }
            $authUser = auth()->user();
            $payment = new SubscriptionPayment();
            $payment->user_id = $authUser->id;
            $payment->subscription_plan_id = $planDetails->id;
            $payment->amount = $planDetails->price;
            $payment->payment_status = 'pending';
            $payment->payment_completed = NULL;
            $payment->txn_id = NULL;
            $payment->created_at = now();
            $payment->save();

            $desciption = 'Payment for subscription #' . $planDetails->id . ' From Residence Pros';
            // $amount = stripe_transaction_fees($planDetails->price);
            $amount = $planDetails->price;
            $metadata = [
                'payment_id' => $payment->id
            ];
            $stripePay = app(Stripe::class)->getPaymentIntent($authUser->name, $desciption, $amount, $metadata);
            if (($stripePay['success'] ?? 0) == 0) {
                return response()->json(['success' => 0, 'msg' => $stripePay['msg'] ?? 'Something went wrong!']);
            }
            $payment->txn_id = $stripePay['intent'];
            $payment->save();
            DB::commit();
            return response()->json(['success' => 1, 'data' => ['client_secret' => $stripePay['secret'], 'user' => ['name' => $authUser->name, 'email' => $authUser->email], 'url' => route('subscription.thank.you', ['id' => $payment->id])]]);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json(['success' => 0, 'msg' => $err->getMessage()]);
        }
    }

    public function thankYou($id)
    {
        $title = 'Thank You for Purchase';
        $payment = SubscriptionPayment::findOrFail($id);
        if ($payment->user_id != auth()->id() ?? 0) {
            abort(404);
        }
        if ($payment->payment_status != 'success') {
            $this->completePayment($payment->txn_id);
        }
        $plan = AgentSubscription::where('user_id', auth()->id())->first();
        return view('frontend.thank-you', compact('payment', 'title', 'plan'));
    }

    public function completePayment($paymentId)
    {
        DB::beginTransaction();
        try {
            $authUser = auth()->user();
            $payment = SubscriptionPayment::where('txn_id', $paymentId)->first();
            $transaction = app(Stripe::class)->getPaymentDetails($paymentId);
            $status = $transaction->status ?? '';
            if ($status == 'succeeded') {
                $payment->payment_status = 'success';
                $payment->payment_completed = now()->format('Y-m-d H:i:s');
                $payment->subscription_end_date = now()->addDays(30)->format('Y-m-d 11:59:59');
                $payment->save();
                $plan = AgentSubscription::where('user_id', $authUser->id)->first();
                if (!$plan) {
                    $plan = new AgentSubscription();
                    $plan->user_id = $authUser->id;
                }
                $plan->subscription_plan_id = $payment->subscription_plan_id;
                $plan->subscription_end_date = now()->addDays(30)->format('Y-m-d');
                $plan->subscription_start = now()->format('Y-m-d');
                $plan->save();
                DB::commit();
                //SEND MAIL
                if (($plan?->plan?->limit ?? 0) > 0) {
                    $benifits = "List property upto " . $plan?->plan?->limit;
                } else {
                    $benifits = "Unlimited property listing";
                }
                $keywords = [
                    $authUser->name,
                    ucfirst($plan?->plan?->name),
                    format_date($plan->subscription_end_date),
                    $benifits,
                    format_amount($payment->amount)
                ];
                Mail::to($authUser->email)->send(new SendFormattedMail(2, $keywords));
            }

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function index()
    {
        $title = 'Subscriptions';
        $links = [
            [
                'name' => 'Subscription'
            ]
        ];
        $subscriptions = SubscriptionPayment::where('user_id', auth()->id())->where('payment_status', 'success')->orderBy('created_at', 'DESC')->get();
        $curentSubscription = AgentSubscription::where('user_id', auth()->id())->first();
        return view('agent.subscription.index', compact('title', 'links', 'subscriptions', 'curentSubscription'));
    }
}
