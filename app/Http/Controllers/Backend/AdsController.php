<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdsPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    public function position()
    {
        $title = 'Add Positions';
        $links = [
            [
                'name' => $title
            ]
        ];
        $ads = AdsPosition::get();
        return view('backend.ads.positions', compact('title', 'links', 'ads'));
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'banner_id' => ['required', 'exists:ads_positions,id'],
            'name' => ['required'],
            'price' => ['required', 'numeric', 'gt:0']
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 0, 'errors' => $validator->errors()->toArray()]);
        }
        $ad = AdsPosition::find($request->banner_id);
        $ad->name = $request->name;
        $ad->price = $request->price;
        $ad->save();
        session()->put('success', 'Successfully updated.');
        return response()->json(['success' => 1]);
    }
}
