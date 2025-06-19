<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AddpropertyRequest;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function addProperty()
    {
        $title = "Add New Property";
        $amenities = Amenity::all();
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        $currentYear = now()->year;
        $years = range($currentYear, $currentYear + 5);
        return view('frontend.agent.add-property', compact('title', 'amenities', 'months', 'years'));
    }

    public function doAddProperty(AddpropertyRequest $requeest){
        dd($requeest->all());
    }
}
