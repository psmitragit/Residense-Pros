<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function addProperty()
    {
        $title = "Add New Property";
        $amenities = Amenity::all();
        return view('frontend.agent.add-property', compact('title', 'amenities'));
    }
}
