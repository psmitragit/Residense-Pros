<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SendFormattedMail;
use App\Models\AdsPosition;
use App\Models\AgentAd;
use App\Models\AgentAdPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    public function position()
    {
        $title = 'Add Positions';
        $links = [
            [
                'name' => $title
            ]
        ];
        $ads = AdsPosition::get();
        return view('backend.ads.positions', compact('title', 'links', 'ads'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner_id' => ['required', 'exists:ads_positions,id'],
            'name' => ['required'],
            'price' => ['required', 'numeric', 'gt:0']
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 0, 'errors' => $validator->errors()->toArray()]);
        }
        $ad = AdsPosition::find($request->banner_id);
        $ad->name = $request->name;
        $ad->price = $request->price;
        $ad->save();
        session()->put('success', 'Successfully updated.');
        return response()->json(['success' => 1]);
    }

    public function pending($id = false)
    {
        $title = 'Pending Ads';
        $links = [
            [
                'name' => $title
            ]
        ];

        $selectedPostion = request()->position ?? '';
        $selectedAgent = request()->agent ?? '';

        $positions = AdsPosition::select('ads_positions.id', 'ads_positions.name')->join('agent_ads', 'agent_ads.ad_position_id', 'ads_positions.id')->where('status', 'pending_approval')->distinct()->get();
        $agents = AgentAd::select('users.id', 'users.first_name', 'users.last_name')->where('agent_ads.status', 'pending_approval')->join('users', 'users.id', 'agent_ads.user_id')->distinct()->get();

        $ads = AgentAd::orderBy('created_at', 'DESC')->where('status', 'pending_approval');
        if (!empty($selectedPostion)) {
            $ads->where('ad_position_id', $selectedPostion);
        }
        if (!empty($selectedAgent)) {
            $ads->where('user_id', $selectedAgent);
        }
        $ads = $ads->paginate(get_option('admin_perpage'));
        return view('backend.ads.pending', compact('title', 'links', 'ads', 'selectedPostion', 'selectedAgent', 'positions', 'agents', 'id'));
    }

    public function showDetails($id)
    {
        $ads = AgentAd::where('id', $id)->first();
        return view('backend.ads.show-details', compact('ads'))->render();
    }

    public function reject($id)
    {
        $ads =  AgentAd::where('id', $id)->where('status', 'pending_approval')->first();
        if (!$ads) {
            return response()->json(['success' => 0, 'msg' => 'Ad not found.']);
        }
        $ads->status = 'reject';
        $ads->save();
        //send mail to user
        $email = $ads?->user?->email ?? '';
        if (!empty($email)) {
            $keyword = [$ads?->position?->name ?? '', $ads?->user?->name ?? ''];
            Mail::to($email)->send(new SendFormattedMail(9, $keyword));
        }
        session()->put('success', 'Ad has been rejected successfully.');
        return response()->json(['success' => 1, 'msg' => $id, 'action' => 'reject']);
    }

    public function approve($id)
    {
        $ads =  AgentAd::where('id', $id)->where('status', 'pending_approval')->first();
        if (!$ads) {
            return response()->json(['success' => 0, 'msg' => 'Ad not found.']);
        }
        $ads->status = 'pending_payment';
        $ads->approved_on = date('Y-m-d H:i:s');
        $ads->save();
        //send mail to user
        $email = $ads?->user?->email ?? '';
        if (!empty($email)) {
            $keyword = [$ads?->position?->name ?? '', $ads?->user?->name ?? '', route('agent.ads.pay', ['id' => $ads?->id ?? 0])];
            Mail::to($email)->send(new SendFormattedMail(8, $keyword));
        }
        session()->put('success', 'Ad has been approved successfully.');
        return response()->json(['success' => 1, 'msg' => '']);
    }

    public function all()
    {
        $title = 'All Ads';
        $links = [
            [
                'name' => $title
            ]
        ];

        $selectedPostion = request()->position ?? '';
        $selectedAgent = request()->agent ?? '';
        $selectedStatus = request()->status ?? '';

        $positions = AdsPosition::select('ads_positions.id', 'ads_positions.name')->join('agent_ads', 'agent_ads.ad_position_id', 'ads_positions.id')->distinct()->get();
        $agents = AgentAd::select('users.id', 'users.first_name', 'users.last_name')->join('users', 'users.id', 'agent_ads.user_id')->distinct()->get();
        $statuses = ['pending_payment' => 'Pending Payment', 'active' => 'Live', 'completed' => 'Completed', 'reject' => 'Rejected'];

        $ads = AgentAd::orderBy('created_at', 'DESC')->where('status', '!=', 'pending_approval')->orderBy('approved_on', 'DESC');
        if (!empty($selectedPostion)) {
            $ads->where('ad_position_id', $selectedPostion);
        }
        if (!empty($selectedAgent)) {
            $ads->where('user_id', $selectedAgent);
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
        if (!empty(request()->approved_date_from)) {
            $ads->whereDate('approved_on', '>=', date('Y-m-d', strtotime(request()->approved_date_from)));
        }
        if (!empty(request()->approved_date_to)) {
            $ads->whereDate('approved_on', '<=', date('Y-m-d', strtotime(request()->approved_date_to)));
        }
        $ads = $ads->paginate(get_option('admin_perpage'));
        return view('backend.ads.all', compact('title', 'links', 'ads', 'selectedPostion', 'selectedAgent', 'positions', 'agents', 'statuses', 'selectedStatus'));
    }

    public function revenue()
    {
        $title = 'Ads Revenue';
        $links = [
            [
                'name' => $title
            ]
        ];

        $totalRevenue = $this->getTotalRevenue(request()->all());

        $selectedPostion = request()->position ?? '';
        $selectedAgent = request()->agent ?? '';
        $selectedStatus = request()->status ?? '';

        $positions = AdsPosition::select('ads_positions.id', 'ads_positions.name')->join('agent_ads', 'agent_ads.ad_position_id', 'ads_positions.id')->where('agent_ads.status', 'active')->distinct()->get();
        $agents = AgentAd::select('users.id', 'users.first_name', 'users.last_name')->join('users', 'users.id', 'agent_ads.user_id')->distinct()->get();
        $statuses = ['active' => 'Live', 'completed' => 'Completed'];

        $ads = AgentAd::select('agent_ads.id', 'agent_ad_payments.amount', 'agent_ad_payments.payment_completed', 'agent_ad_payments.rate', 'agent_ad_payments.total_days', DB::raw('CONCAT(first_name, " ", last_name) as name'), DB::raw('ads_positions.name as position_name'))
            ->join('agent_ad_payments', 'agent_ad_payments.id', 'agent_ads.transaction_id')
            ->join('users', 'users.id', 'agent_ads.user_id')
            ->join('ads_positions', 'ads_positions.id', 'agent_ads.ad_position_id')
            ->where('payment_status', 'success')
            ->orderBy('agent_ad_payments.payment_completed', 'DESC');

        if (!empty($selectedPostion)) {
            $ads->where('agent_ad_payments.ad_position_id', $selectedPostion);
        }
        if (!empty($selectedAgent)) {
            $ads->where('agent_ad_payments.user_id', $selectedAgent);
        }
        if (!empty($selectedStatus)) {
            if ($selectedStatus == 'completed') {
                $ads->where('agent_ads.status', 'active')->whereDate('agent_ads.end_date', '<', now()->format('Y-m-d'));
            } else if ($selectedStatus == 'active') {
                $ads->where('agent_ads.status', 'active')->whereDate('agent_ads.end_date', '>=', now()->format('Y-m-d'));
            } else {
                $ads->where('status', $selectedStatus);
            }
        }
        if (!empty(request()->payment_date_from)) {
            $ads->whereDate('agent_ad_payments.payment_completed', '>=', date('Y-m-d 00:00:00', strtotime(request()->payment_date_from)));
        }
        if (!empty(request()->payment_date_to)) {
            $ads->whereDate('agent_ad_payments.payment_completed', '<=', date('Y-m-d 23:59:59', strtotime(request()->payment_date_to)));
        }
        $ads = $ads->paginate(get_option('admin_perpage'));
        return view('backend.ads.revenue', compact('title', 'links', 'ads', 'selectedPostion', 'selectedAgent', 'positions', 'agents', 'statuses', 'selectedStatus', 'totalRevenue'));
    }

    public function getTotalRevenue($request = [], $format = true)
    {
        $revenue = AgentAdPayment::select(DB::raw('SUM(amount) as amount'))->where('payment_status', 'success');
        if (!empty($request['payment_date_from'])) {
            $revenue->whereDate('payment_completed', '<=', date('Y-m-d 23:59:59', strtotime($request['payment_date_from'])));
        }
        if (!empty($request['payment_date_to'])) {
            $revenue->whereDate('payment_completed', '<=', date('Y-m-d 23:59:59', strtotime($request['payment_date_to'])));
        }
        if (!empty($request['position'])) {
            $revenue->where('ad_position_id', $request['position']);
        }
        if (!empty($request['agent'])) {
            $revenue->where('user_id', $request['agent']);
        }
        $revenue = $revenue->first();
        return $format ? format_amount($revenue?->amount ?? 0, specialFormat: true) : ($revenue?->amount ?? 0);
    }
}
