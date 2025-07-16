<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Stripe;
use App\Mail\SendFormattedMail;
use App\Models\AdsPosition;
use App\Models\AgentAd;
use App\Models\AgentAdPayment;
use App\Models\AgentTempAdImageStore;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    public function all()
    {
        $selectedPostion = request()->position ?? '';
        $selectedStatus = request()->status ?? '';
        $ads = AgentAd::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->where('status', '!=', 'withdrawal');
        if (!empty($selectedPostion)) {
            $ads->where('ad_position_id', $selectedPostion);
        }
        if (!empty($selectedStatus)) {
            if ($selectedStatus == 'completed') {
                $ads->where('status', 'active')->whereDate('end_date', '<', now()->format('Y-m-d'));
            } else if ($selectedStatus == 'active') {
                $ads->where('status', 'active')->whereDate('end_date', '>=', now()->format('Y-m-d'));
            } else {
                $ads->where('status', $selectedStatus);
            }
        }
        $ads = $ads->paginate(get_option('admin_perpage'));
        $positions = AdsPosition::select('ads_positions.id', 'ads_positions.name')->join('agent_ads', 'agent_ads.ad_position_id', 'ads_positions.id')->where('user_id', auth()->id())->distinct()->get();
        $statuses = ['pending_approval' => 'Pending Approval', 'pending_payment' => 'Pending Payment', 'active' => 'Live', 'completed' => 'Completed', 'reject' => 'Rejected'];
        return view('agent.ads.list', compact('ads', 'positions', 'statuses', 'selectedPostion', 'selectedStatus'));
    }

    public function add()
    {
        $title = 'Add New Ad';
        $links = [
            [
                'name' => $title
            ]
        ];
        $adsPositions = AdsPosition::orderBy('id', 'ASC')->get();
        $positions = [];
        foreach ($adsPositions as $key => $value) {
            $positions[$value->id] = $value->name . ' - ' . format_amount($value->price) . '/day';
        }
        return view('agent.ads.add', compact('title', 'links', 'positions'));
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), [
                'position' => ['required', 'exists:ads_positions,id'],
                'duration' => ['required', 'numeric', 'integer', 'gt:0'],
                'ad_url' => ['required', 'url'],
                'adImage' => ['required', 'mimes:jpg,jpeg,png']
            ], [
                'duration.integer' => 'Duration must be a whole number'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => 0, 'errors' => $validator->errors()->toArray()]);
            }

            $authUser = auth()->user();
            $adPositionDetails = AdsPosition::find($request->position);
            $adPositionRate = $adPositionDetails->price;
            $duration = $request->duration;
            $totalAmount = $adPositionRate * $duration;

            $adPayment = new AgentAdPayment();
            $adPayment->user_id = $authUser->id;
            $adPayment->amount = $totalAmount;
            $adPayment->payment_status = 'pending';
            $adPayment->rate = $adPositionRate;
            $adPayment->total_days = $duration;
            $adPayment->ad_position_id  = $adPositionDetails->id;
            $adPayment->save();

            $agentAd = new AgentAd();
            $agentAd->user_id = $authUser->id;
            $agentAd->status = 'pending_approval';
            $agentAd->applied_on = now()->format('Y-m-d H:i:s');
            $agentAd->ad_position_id = $adPositionDetails->id;
            $agentAd->transaction_id = $adPayment->id;
            $agentAd->ad_url = $request->ad_url;
            $agentAd->total_days = $duration;
            $agentAd->save();

            if ($request->hasFile('adImage')) {
                $image = $request->file('adImage');
                $imageName = 'IMG_' . 1 . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $request->adImage->move(public_path('storage/ads'), $imageName);
                $dbImage = 'storage/ads/' . $imageName;
                $agentAd->ad_file_path = $dbImage;
                $agentAd->save();
            }
            //send mail to admin
            $this->sendMailToAdminForApprove($agentAd);
            DB::commit();
            session()->put('success', 'Thank you! Your ad is currently pending admin approval. Once approved, we\'ll share the payment link with you. After completing the payment, your ad will be published.');
            return response()->json(['success' => 1, 'redirect' => route('agent.ads.all')]);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json(['success' => 1, 'msg' => $err->getMessage()]);
        }
    }

    public function sendMailToAdminForApprove($agentAd)
    {
        $title = $agentAd?->position?->name ?? '';
        $user = $agentAd?->user?->name ?? '';
        $date = format_date($agentAd?->applied_on);
        $url = route('admin.ads.pending.details', ['id' => $agentAd->id]);
        $keywords = [$title, $user, $date, $url];
        $email = get_option('notification_email');
        Mail::to($email)->send(new SendFormattedMail(6, $keywords));
    }

    public function preview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => ['required', 'exists:ads_positions,id'],
            // 'duration' => ['required', 'numeric', 'gt:0'],
            'ad_url' => ['required', 'url'],
            'adImage' => ['required', 'mimes:jpg,jpeg,png']
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 0, 'errors' => $validator->errors()->toArray()]);
        }
        $authUser = Auth::user();
        AgentTempAdImageStore::updateOrInsert([
            'user_id' => $authUser->id
        ], [
            'ad_position_id' => $request->position,
            'image' => 'data:' . $request->file('adImage')->getClientMimeType() . ';base64,' . base64_encode(file_get_contents($request->file('adImage')->getRealPath())),
            'url' => $request->ad_url
        ]);
        return response()->json(['success' => 1, 'redirect' => route('agent.ads.preview.ad')]);
    }

    public function previewAd()
    {
        $authUser = Auth::user();
        $tempData = AgentTempAdImageStore::where('user_id', $authUser->id)->firstOrFail();
        $image = $tempData?->image ?? '';
        $link = $tempData?->url ?? '';
        $position = $tempData->ad_position_id;

        $output = '';
        switch ($position) {
            case '1':
                $output = app(HomeController::class)->index();
                break;
            case '2':
                $output = app(HomeController::class)->index();
                break;
            case '3':
                $output = app(HomeController::class)->properties();
                break;
            case '4':
                $output = app(HomeController::class)->faqs();
                break;
            case '5':
                $output = app(HomeController::class)->faqs();
                break;
            case '6':
                $output = app(HomeController::class)->blogs();
                break;
            case '7':
                $output = app(HomeController::class)->contact();
                break;
            default:
                abort(404);
                break;
        }
        return view('agent.ads.preview', compact('output', 'tempData', 'image', 'link', 'position'));
    }

    public function withdrawal($id)
    {
        $ads = AgentAd::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $ads->status = 'withdrawal';
        $ads->save();
        return redirect()->back()->with('success', 'Ad successfully removed!');
    }

    public function pay($id)
    {
        $title = 'Make Payment';
        $ad =  AgentAd::where('id', $id)->where('user_id', auth()->id())->where('status', 'pending_payment')->firstOrFail();
        if ($ad->payment->payment_status != 'pending') {
            abort(404);
        }
        return view('agent.ads.pay', compact('ad', 'title'));
    }

    public function payCreate(Request $request)
    {
        DB::beginTransaction();
        try {
            $id = $request->id ?? '';
            $ad = AgentAd::where('id', $id)->where('user_id', auth()->id())->where('status', 'pending_payment')->first();
            if (!$ad) {
                return response()->json(['success' => 0, 'msg' => 'Ad not found.']);
            }
            $authUser = auth()->user();
            $payment = $ad->payment;
            $desciption = 'Payment for agent ad #' . $ad->id . ' From Residence Pros';
            $amount = $payment?->amount ?? 0;
            $metadata = [
                'ad_id' => $ad->id
            ];
            $stripePay = app(Stripe::class)->getPaymentIntent($authUser->name, $desciption, $amount, $metadata);
            if (($stripePay['success'] ?? 0) == 0) {
                return response()->json(['success' => 0, 'msg' => $stripePay['msg'] ?? 'Something went wrong!']);
            }
            $payment->txn_id = $stripePay['intent'];
            $payment->save();
            DB::commit();
            return response()->json(['success' => 1, 'data' => ['client_secret' => $stripePay['secret'], 'user' => ['name' => $authUser->name, 'email' => $authUser->email], 'url' => route('agent.ads.pay.thank.you', ['id' => $ad->id])]]);
        } catch (Exception $err) {
            DB::rollBack();
            return response()->json(['success' => 0, 'msg' => $err->getMessage()]);
        }
    }

    public function thankYou($id)
    {
        $ad = AgentAd::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        if (!$ad) {
            return redirect()->back()->with('error', 'Ad not found!');
        }
        $title = 'Your payment has been completed';
        if ($ad?->payment?->payment_status != 'success') {
            $this->completePayment($ad?->payment?->txn_id, $ad->id);
        }
        //REASSIGN VERIABLE AGAIN TO REFLECT CHANGES
        $payment = AgentAdPayment::where('txn_id', $ad?->payment?->txn_id)->firstOrFail();
        $ad = AgentAd::where('id', $id)->first();
        return view('agent.ads.thank-you', compact('ad', 'payment', 'title'));
    }

    public function completePayment($paymentId, $ad_id)
    {
        DB::beginTransaction();
        try {
            $payment = AgentAdPayment::where('txn_id', $paymentId)->firstOrFail();
            $transaction = app(Stripe::class)->getPaymentDetails($paymentId);
            $status = $transaction->status ?? '';
            if ($status == 'succeeded') {
                $payment->payment_status = 'success';
                $payment->payment_completed = now()->format('Y-m-d H:i:s');
                $payment->save();
                $ad = AgentAd::findOrFail($ad_id);
                $ad->status = 'active';
                $ad->start_date = now()->format('Y-m-d');
                $ad->end_date = now()->addDays($ad->total_days)->format('Y-m-d');
                $ad->save();
                DB::commit();
                //SEND MAIL
                $keywords = [
                    $ad?->position?->name ?? '',
                    $ad?->user?->name ?? '',
                    format_date($ad->end_date),
                    $ad?->liveUrl()
                ];
                Mail::to($ad?->user?->email ?? '')->send(new SendFormattedMail(7, $keywords));
            }
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }

    public function previewDetails($id)
    {
        $ads = AgentAd::where('id', $id)->where('user_id', auth()->id())->first();
        return view('agent.ads.show-details', compact('ads'))->render();
    }
}
