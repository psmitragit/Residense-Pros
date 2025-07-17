<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AgentSubscription extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function plan()
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id', 'id');
    }
    public function getEndDateMessage()
    {
        $end = $this->subscription_end_date;
        $dayDiff = now()->diffInDays($end);
        if ($dayDiff < -1) {
            return 'Your subscription has ended. Please <a href="' . route('agent.subscription') . '" target="_blank">purchase</a> a new subscription.';
        }
        if ($dayDiff < 0) {
            return 'Your subscription ends today.';
        }
        $returnTxt = '';
        if ($dayDiff > 0 && $dayDiff < 1) {
            $returnTxt = 'Your subscription will end tomorrow.';
        }
        if (empty($returnTxt)) {
            $returnTxt = 'Your subscription will end on ' . format_date($end) . '.';
        }
        $agentPostingLimit = $this->plan?->limit ?? -1;
        if ($agentPostingLimit != 0) { // 0 mean unlimited
            $start_date = Carbon::parse($this->subscription_start)->startOfDay()->format('Y-m-d H:i:s');
            $agentTotalPosting = Property::whereDate('submitted_at', '>=', $start_date)->count();
            $remaining = $agentPostingLimit - $agentTotalPosting;
            $returnTxt .= ' You have ' . $remaining . ' property listing left.';
        }
        return $returnTxt;
    }
}
