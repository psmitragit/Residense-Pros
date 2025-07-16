<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\SendFormattedMail;
use App\Models\AdsPosition;
use App\Models\AgentAd;
use Illuminate\Http\Request;
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
}
