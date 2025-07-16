<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentAd extends Model
{
    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo(AdsPosition::class, 'ad_position_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(AgentAdPayment::class, 'id', 'transaction_id');
    }

    public function getFormattedStatusAttribute()
    {
        if ($this->status == 'pending_approval') {
            return '<span class="text-info">Pending Approval</span>';
        }
        if ($this->status == 'pending_payment') {
            return '<span class="text-danger">Pending Payment</span>';
        }
        if ($this->status == 'active' && is_expired($this->end_date) == 0) {
            return '<span class="text-success">Live</span>';
        }
        if ($this->status == 'active') {
            return '<span class="text-primary">Completed</span>';
        }
        if ($this->status == 'reject') {
            return '<span class="text-danger">Rejected</span>';
        }
        return ucfirst(str_replace('_', ' ', $this->status));
    }

    public function formatted_date($column)
    {
        if (!empty($this->$column)) {
            return format_date($this->$column);
        }
        return '-';
    }

    public function image()
    {
        return asset($this->ad_file_path);
    }

    public function getFormattedTotalDaysAttribute()
    {
        if ($this->total_days == 1) {
            return $this->total_days . ' day';
        }
        return $this->total_days . ' days';
    }

    public function liveUrl()
    {
        return route('index');
    }
}
