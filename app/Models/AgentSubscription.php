<?php

namespace App\Models;

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
            return 'Your subscription has ended. Please <a href="'.route('agent.subscription').'" target="_blank">purchase</a> a new subscription.';
        }
        if ($dayDiff < 0) {
            return 'Your subscription ends today.';
        }
        if ($dayDiff > 0 && $dayDiff < 1) {
            return 'Your subscription will end tomorrow.';
        }
        return 'Your subscription will end on ' . format_date($end) . '.';
    }
}
