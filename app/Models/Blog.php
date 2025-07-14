<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Blog extends Model
{
    use HasSlug;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories');
    }
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function image()
    {
        if (!empty($this->image) && is_file_exists($this->image)) {
            return asset($this->image);
        }
        return asset('assets/frontend/images/no-property-image.png');
    }

    public function likes()
    {
        return $this->hasMany(BlogLike::class, 'blog_id', 'id');
    }
}
