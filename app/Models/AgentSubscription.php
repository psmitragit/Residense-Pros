<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentSubscription extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    public function plan(){
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id', 'id');
    }
}
