<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        return view('backend.dashboard', compact('title'));
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
            'email' => ['required', 'email', 'unique:users,email,'.(auth('admin')->user()->id ?? '')],
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
}
