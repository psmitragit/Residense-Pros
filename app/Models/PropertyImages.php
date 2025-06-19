<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImages extends Model
{
    protected $guarded = [];
    public function property()
    {
        return $this->belongsTo(Propety::class);
    }
}
