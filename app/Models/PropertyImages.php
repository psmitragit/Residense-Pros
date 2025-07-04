<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImages extends Model
{
    protected $guarded = [];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function image(){
        return asset($this->path);
    }
}
