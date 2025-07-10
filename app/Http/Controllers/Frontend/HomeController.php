<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $filter = request()->all() ?? [];
        if(request()->ajax()){
            if(request()->type == 'property'){
                $properties = getProperties(filter: $filter);
                return response()->json(['success' => 1, 'html' => view('frontend.home.inc.listing', ['properties' => $properties, 'country' => request()->country ?? '', 'filter' => $filter])->render()]);
            }else if(request()->type == 'blog'){
                $blogs = getBlogs(filter: $filter);
                return response()->json(['success' => 1, 'html' => view('frontend.home.inc.listing-blogs', compact('blogs'))->render()]);
            }
        }
        $allCountries = Property::select('country_id')->groupBy('country_id')->join('countries', 'countries.id', 'properties.country_id')->orderBy('countries.display_order', 'ASC');
        if(!empty(request()->country)){
            $allCountries->where('countries.id', request()->country);
        }
        $allCountries = $allCountries->pluck('country_id')->toArray();
        $group = [];
        foreach ($allCountries as $key => $value) {
            $propertyFilter = [
                'country' => $value,
                'city' => request()->city ?? '',
                'zip' => request()->zip ?? '',
                'residence_type' => request()->residence_type ?? '',
                'buy_or_rent' => request()->buy_or_rent ?? '',
                'min_price' => request()->min_price ?? '',
                'max_price' => request()->max_price ?? ''
            ];
            $group[$value] = getProperties(filter: $propertyFilter);
        }
        $blogs = getBlogs(filter: $filter);
        $get_options = get_option(['homepage_title', 'homepage_description']);
        $homepage_title = $get_options['homepage_title'] ?? '';
        $homepage_description = $get_options['homepage_description'] ?? '';
        return view('frontend.home.index', compact('group', 'blogs', 'homepage_title', 'homepage_description', 'filter'));
    }

    public function about()
    {
        $title = 'About Us';
        $links = [
            [
                'url' => route('index'),
                'name' => 'Home'
            ],
            [
                'name' => $title
            ]
        ];
        return view('frontend.home.about', compact('title', 'links'));
    }
    public function faqs()
    {
        $title = 'Frequently Asked Questions';
        $links = [
            [
                'url' => route('index'),
                'name' => 'Home'
            ],
            [
                'name' => 'FAQs'
            ]
        ];
        return view('frontend.home.faqs', compact('title', 'links'));
    }

    public function contact()
    {
        $title = 'Contact Us';
        $links = [
            [
                'url' => route('index'),
                'name' => 'Home'
            ],
            [
                'name' => $title
            ]
        ];
        return view('frontend.home.contact', compact('title', 'links'));
    }

    public function blogs()
    {
        $title = 'Blog Posts';
        $links = [
            [
                'url' => route('index'),
                'name' => 'Home'
            ],
            [
                'name' => 'Blogs'
            ]
        ];
        return view('frontend.home.blogs', compact('title', 'links'));
    }

    public function properties()
    {
        $title = 'Blog Posts';
        return view('frontend.propety.index', compact('title'));
    }

    public function propertyDetails($slug){
        $title = 'Property Details';
        return view('frontend.propety.details', compact('title'));
    }

    public function blogDetails($slug){
        dd($slug);
    }
}
