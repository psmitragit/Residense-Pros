<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\HomeController;
use App\Models\AdsPosition;
use App\Models\AgentTempAdImageStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdsController extends Controller
{
    public function all()
    {
        return view('agent.ads.list');
    }

    public function add()
    {
        $title = 'Add New Ad';
        $links = [
            [
                'name' => $title
            ]
        ];
        $adsPositions = AdsPosition::orderBy('id', 'ASC')->get();
        $positions = [];
        foreach ($adsPositions as $key => $value) {
            $positions[$value->id] = $value->name . ' - ' . format_amount($value->price) . '/day';
        }
        return view('agent.ads.add', compact('title', 'links', 'positions'));
    }

    public function save(Request $request)
    {
        dd($request->all());
    }

    public function preview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'position' => ['required', 'exists:ads_positions,id'],
            // 'duration' => ['required', 'numeric', 'gt:0'],
            'ad_url' => ['required', 'url'],
            'adImage' => ['required', 'mimes:jpg,jpeg,png']
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => 0, 'errors' => $validator->errors()->toArray()]);
        }
        $authUser = Auth::user();
        AgentTempAdImageStore::updateOrInsert([
            'user_id' => $authUser->id
        ], [
            'ad_position_id' => $request->position,
            'image' => 'data:' . $request->file('adImage')->getClientMimeType() . ';base64,' . base64_encode(file_get_contents($request->file('adImage')->getRealPath())),
            'url' => $request->ad_url
        ]);
        return response()->json(['success' => 1, 'redirect' => route('agent.ads.preview.ad')]);
    }

    public function previewAd(){
        $authUser = Auth::user();
        $tempData = AgentTempAdImageStore::where('user_id', $authUser->id)->firstOrFail();

        $output = app(HomeController::class)->index();


        return view('agent.ads.preview', compact('output'));


    }
}
