<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    protected $guarded = [];

    public function features()
    {
        if ($this->limit > 0) {
            return '<li>
                <i class="fas fa-check text-success me-2"></i>List property up to ' . $this->limit . '
            </li>';
        }
        return '<li>
            <i class="fas fa-check text-success me-2"></i>Unlimited property listing
        </li>';
    }
}
