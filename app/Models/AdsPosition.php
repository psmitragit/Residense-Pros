<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsPosition extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function image()
    {
        return asset($this->demo_file_path);
    }
}
