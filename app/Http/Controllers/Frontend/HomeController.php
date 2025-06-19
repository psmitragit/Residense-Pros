<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('frontend.home.index');
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

    public function propertyDetails($id){
        $title = 'Property Details';
        return view('frontend.propety.details', compact('title'));
    }
}
