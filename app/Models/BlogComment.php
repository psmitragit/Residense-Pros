<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(BlogComment::class, 'parent_id', 'id');
    }
}
