<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPayment;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Subscription;

use function PHPUnit\Framework\isNan;

class SubscriptionController extends Controller
{
    public function index()
    {
        $title = 'Subscriptions';
        $links = [
            [
                'name' => $title
            ]
        ];
        $subscriptions = SubscriptionPlan::orderBy('id', 'ASC')->get();
        return view('backend.subscriptions.index', compact('title', 'links', 'subscriptions'));
    }
    public function save(Request $request)
    {
        $error = [];
        //Validation
        $maxPrice = 0;
        $maxLimit = -1;
        foreach ($request->subscriptions as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == 'name') {
                    if (empty($v)) {
                        $error['name_' . $key] = 'This field is required';
                    }
                } else if ($k == 'price') {
                    if (blank($v)) {
                        $error['price_' . $key] = 'This field is required';
                        continue;
                    }
                    if (empty($v) || $v < 0) {
                        $error['price_' . $key] = 'Price should be more than 0';
                        continue;
                    }
                    if (!is_numeric($v)) {
                        $error['price_' . $key] = 'Price should be a valid number';
                        continue;
                    }
                    if ($v <= $maxPrice) {
                        $error['price_' . $key] = 'This price should be more than it\'s previous one.';
                        continue;
                    }
                    $maxPrice = $v;
                } else if ($k == 'limit') {
                    if (blank($v)) {
                        $error['limit_' . $key] = 'This field is required';
                        continue;
                    }
                    if ($v < 0) {
                        $error['limit_' . $key] = 'The limit should not negetive number.';
                        continue;
                    }
                    if (!is_numeric($v)) {
                        $error['limit_' . $key] = 'Limit should be a valid number';
                        continue;
                    }
                    if ($v <= $maxLimit && $v > 0) {
                        $error['limit_' . $key] = 'This limit should be more than it\'s previous one.';
                        continue;
                    }
                    $maxLimit = $v;
                }
            }
        }

        if (!empty($error)) {
            return response()->json(['success' => 0, 'errors' => $error]);
        }

        //Validation passed 
        foreach ($request->subscriptions as $key => $value) {
            $plan = SubscriptionPlan::find($key + 1);
            if ($plan) {
                $plan->name = $value['name'];
                $plan->price = $value['price'];
                $plan->limit = empty($value['limit']) ? 0 : $value['limit'];
                $plan->save();
            }
        }
        return response()->json(['success' => 1, 'msg' => 'Subscription plan updated successfully.']);
    }

    public function history()
    {
        $selectedAgent = request()->agent ?? '';
        $selectedPlan = request()->plan ?? '';
        $start_date = request()->start_date  ?? '';
        $end_date = request()->end_date  ?? '';

        $plans = SubscriptionPlan::orderBy('id', 'ASC')->get();

        $agents = User::select('users.first_name', 'users.last_name', 'users.id')
            ->join('subscription_payments', 'subscription_payments.user_id', 'users.id')
            ->distinct()
            ->orderBy('users.first_name', 'ASC')
            ->get();

        $histories = SubscriptionPayment::where('payment_status', 'success');
        if (!empty($selectAgent)) {
            $histories->where('user_id', $selectedAgent);
        }

        if (!empty($selectedPlan)) {
            $histories->where('subscription_plan_id', $selectedPlan);
        }

        if (!empty($start_date)) {
            $histories->whereDate('payment_completed', '>=', date('Y-m-d 00:00:00', strtotime($start_date)));
        }

        if (!empty($end_date)) {
            $histories->whereDate('payment_completed', '<=',  date('Y-m-d 23:59:59', strtotime($end_date)));
        }

        $histories = $histories->orderBy('payment_completed', 'DESC')->paginate(get_option('admin_perpage'));
        $totalRevenue = $this->getTotalRevenue(request()->all());
        return view('backend.subscriptions.histories', compact('histories', 'agents', 'selectedPlan', 'selectedAgent', 'plans', 'totalRevenue'));
    }

    public function getTotalRevenue($filter, $format = true)
    {
        $revenue = SubscriptionPayment::select(DB::raw('SUM(amount) as amount'))->where('payment_status', 'success');
        if (!empty($filter['agent'])) {
            $revenue->where('user_id', $filter['agent']);
        }

        if (!empty($filter['plan'])) {
            $revenue->where('subscription_plan_id', $filter['plan']);
        }

        if (!empty($filter['start_date'])) {
            $revenue->whereDate('payment_completed', '>=', date('Y-m-d 00:00:00', strtotime($filter['start_date'])));
        }

        if (!empty($filter['end_date'])) {
            $revenue->whereDate('payment_completed', '<=',  date('Y-m-d 23:59:59', strtotime($filter['end_date'])));
        }
        $revenue = $revenue->first();
        return $format ? format_amount($revenue?->amount ?? 0) : $revenue?->amount ?? 0;
    }
}
