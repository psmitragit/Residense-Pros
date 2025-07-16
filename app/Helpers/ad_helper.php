<?php

use App\Models\AgentAd;

function get_ad_module($position_id){
    $activeAds = AgentAd::where('status', 'active')->where('end_date', '>=', now()->format('Y-m-d'))->where('ad_position_id', $position_id)->inRandomOrder()->get();
    return view('frontend.ads.'.$position_id, compact('activeAds'))->render();
}

function get_pending_approval_ads(){
    return AgentAd::where('status', 'pending_approval')->count();
}