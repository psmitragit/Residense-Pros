<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\DateTimeException;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Property extends Model
{
    use HasSlug;
    protected $guarded = [];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities', 'property_id', 'amenities_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function getFeaturedImage()
    {
        $image = PropertyImages::where('property_id', $this->id)->where('file_for', 'gallery')->orderBy('created_at', 'ASC')->first();
        if ($image && is_file_exists($image->path)) {
            return asset($image->path);
        }
        return asset('assets/frontend/images/no-property-image.png');
    }

    public function getImages($type = 'gallery')
    {
        $images = PropertyImages::select('path')->where('file_for', $type)->where('property_id', $this->id)->orderBy('created_at', 'DESC')->get();
        $returnData = [];
        foreach ($images as $key => $value) {
            if (!empty($value) && is_file_exists($value->path)) {
                $returnData[] = asset($value->path);
            }
        }
        return $returnData;
    }

    public function getCountryFlag()
    {
        return '<img src="' . asset('assets/frontend/images/flags/' . strtolower($this->country?->code2 ?? '')) . '.svg" class="flag-icon ms-1" alt="' . ($this->country?->name ?? '') . ' Flag">';
    }

    public function getFullAddressAttribute()
    {
        $data = [];
        if (!empty($this->address)) {
            $data[] = $this->address;
        }
        if (!empty($this->state)) {
            $data[] = $this->state;
        }
        if (!empty($this->city)) {
            $data[] = $this->city;
        }
        if (!empty($this->zip)) {
            $data[] = $this->zip;
        }
        return implode(', ', $data);
    }

    public function getWhatsappUrlAttribute()
    {
        $message = 'Hi ' . ($this?->user?->name ?? '') . ', I\'m reaching out regarding your property "' . $this->name . '" listed on ' . get_option('site_title') . '. Could you please provide more details about it?';
        $phone = str_replace(['+', ' ', '-'], ['', '', ''], $this?->user?->phone ?? '');
        return 'https://wa.me/' . $phone . '?text=' . urlencode($message);
    }

    public function getAvailableFromAttribute()
    {
        try {
            $month = $this?->property_available_month ?? '';
            $year = $this?->property_available_year ?? '';
            if (empty($month) && empty($year)) {
                return '-';
            }
            $date = Carbon::create($year, ($month + 1), 0);
            return $date->format('F Y');
        } catch (DateTimeException $err) {
            return '-';
        } catch (Exception $err) {
            return '-';
        }
    }

    public function nearby()
    {
        return $this->hasMany(PropertyNearbyPlace::class, 'property_id', 'id');
    }

    public function getTotalViewsAttribute(){
        return PropertyView::where('property_id', $this->id)->count();
    }

    public function price(){
        $price = format_amount($this->price, 2, $this->country?->currency_symbol ?? '$', true);
        if($this->property_type == 'rent'){
            $price .= '/'. $this->price_type;
        }
        return $price;
    }
}
