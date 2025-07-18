<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\AgentAd;
use App\Models\EnqueryHistory;
use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $pendingAdsPayment = AgentAd::where('user_id', auth()->id())->where('status', 'pending_payment')->count();
        $listedProperties = Property::where('created_by', auth()->id())->where('status', 'published')->count();
        $totalEnquiry = EnqueryHistory::where('user_id', auth()->id())->count();
        $completedAds = AgentAd::where('user_id', auth()->id())->where('status', 'active')->whereDate('end_date', '<', date('Y-m-d'))->count();
        return view('agent.dashboard.index', compact('title', 'pendingAdsPayment', 'listedProperties', 'totalEnquiry', 'completedAds'));
    }
}
