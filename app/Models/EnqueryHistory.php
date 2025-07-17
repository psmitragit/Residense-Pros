<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnqueryHistory extends Model
{
    protected $fillable = [];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
