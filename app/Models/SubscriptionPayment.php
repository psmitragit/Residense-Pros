<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPayment extends Model
{
    protected $guarded = [];

    public function plan(){
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id', 'id');
    }
}
