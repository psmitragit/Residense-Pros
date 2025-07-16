<?php

use App\Models\AgentAd;

function get_ad_module($position_id){
    return view('frontend.ads.'.$position_id)->render();
}

function get_pending_approval_ads(){
    return AgentAd::where('status', 'pending_approval')->count();
}