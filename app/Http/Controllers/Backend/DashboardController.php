<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $activeProperties = Property::where('status', 'published')->where('archive', '0')->count();
        $totalAgents = User::where('role', 'agent')->where('status', 'active')->count();
        $subscriptionRevenue = app(SubscriptionController::class)->getTotalRevenue([]);
        $adsRevenue = app(AdsController::class)->getTotalRevenue([]);
        return view('backend.dashboard', compact('title', 'activeProperties', 'totalAgents', 'subscriptionRevenue', 'adsRevenue'));
    }

    public function editProfile()
    {
        $title = 'Edit profile';
        return view('backend.edit-profile', compact('title'));
    }

    public function doEditProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . (auth('admin')->user()->id ?? '')],
            'password' => ['nullable', 'min:8']
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->messages() as $key => $value) {
                $errors[$key] = $value[0];
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }
        $user = auth('admin')->user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        session()->put('success', 'Profile updated successfully.');
        return response()->json(['success' => 1]);
    }

    public function settings()
    {
        $title = 'General Settings';
        $settings = get_option();
        return view('backend.settings', compact('title', 'settings'));
    }

    public function updateSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_title' => ['required'],
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'linkedin' => ['nullable', 'url'],
            'notification_email' => ['required', 'email'],
            'admin_perpage' => ['required', 'numeric', 'gt:0'],
            'frontend_perpage' => ['required', 'numeric', 'gt:0'],
            'homepage_title' => ['required'],
            'homepage_description' => ['required'],
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->messages() as $key => $value) {
                $errors[$key] = $value[0];
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }
        foreach ($request->except(['_token']) as $key => $value) {
            Option::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        session()->put('success', 'Settings updated successfully.');
        return response()->json(['success' => 1]);
    }
}
