<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyAmenity extends Model
{
    protected $guarded = [];

    public function amenity()
    {
        return $this->belongsTo(Amenity::class, 'amenity_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
