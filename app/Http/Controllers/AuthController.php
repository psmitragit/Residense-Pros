<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\LoginRequest;
use App\Http\Requests\Frontend\SignupRequest;
use App\Mail\SendFormattedMail;
use App\Mail\SendMail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(SignupRequest $request)
    {
        try {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zip = $request->zip;
            $user->country_id = $request->country ?? NULL;
            $user->password = Hash::make($request->password);
            $user->role = $request->type;
            $user->email_verification_send_at = now()->format('Y-m-d H:i:s');
            $user->save();
            $url = route('auth.varify.email', ['id' => encrypt($user->id)]);
            Mail::to($user->email)->send(new SendFormattedMail(1, [$user->name, $url]));
            return response()->json(['success' => 1, 'msg' => '<span class="text-success">An email has been sent to your registered email address. Please click the link to verify it.</span>']);
        } catch (Exception $err) {
            return response()->json(['success' => 0, 'msg' => $err->getMessage()]);
        }
    }

    public function varifyEmail($id)
    {
        try {
            $id = decrypt($id);
            $user = User::findOrFail($id);
            if ($user->status != 'pending' || empty($user->email_verification_send_at)) {
                abort(404);
            }
            $day = Carbon::parse($user->email_verification_send_at)->diffInDays();
            if ($day > 1) {
                return redirect()->route('index')->with('error', 'Link is expired.');
            }
            $user->email_verification_send_at = NULL;
            $user->email_verified_at = now()->format('Y-m-d H:i:s');
            $user->status = 'active';
            $user->save();
            return redirect()->route('index', ['auth_modal' => 1])->with('success', 'Email varified successfully.');
        } catch (Exception $err) {
            abort(404);
        }
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->where('role', '!=', 'admin')->first();
        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->status == 'pending') {
                $user->email_verification_send_at = now()->format('Y-m-d H:i:s');
                $user->save();
                $url = route('auth.varify.email', ['id' => encrypt($user->id)]);
                Mail::to($user->email)->send(new SendFormattedMail(1, [$user->name, $url]));
                return response()->json(['success' => 1, 'msg' => '<span class="text-success">An email has been sent to your registered email address. Please click the link to verify it.</span>']);
            } else {
                Auth::login($user);
                return response()->json(['success' => 1, 'redirect' => route('index')]);
            }
        } else {
            return response()->json(['success' => 0, 'errors' => ['email' => 'The credentials does not match our records.']]);
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('index');
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email']
        ], [
            'email.exists' => 'This email is not registered with us'
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->keys() as $fieldKey) {
                $errors[$fieldKey] = $validator->errors()->first($fieldKey);
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }
        $user = User::where('email', $request->email)->first();
        if ($user->role == 'admin') {
            return response()->json(['success' => 0, 'errors' => ['email' => 'This email is not registered with us']]);
        }
        $status = Password::sendResetLink($request->only('email'));
        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['success' => 1, 'msg' => 'Password reset link has been sent to your email address.']);
        } else {
            return response()->json(['success' => 0, 'errors' => ['email' => __($status)]]);
        }
    }

    public function resetPassword($token)
    {
        $title = 'Reset Password';
        return view('frontend.auth.reset-password', compact('title', 'token'));
    }

    public function doResetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password']
        ], [
            'email.exists' => 'This email is not registered with us.'
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->keys() as $fieldKey) {
                $errors[$fieldKey] = $validator->errors()->first($fieldKey);
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
        if ($status === Password::PASSWORD_RESET) {
            session()->put('success' , 'Password changed successfully.');
            return response()->json(['success' => 1, 'redirect' => route('index', ['auth_modal' => 1])]);
        }
        return response()->json(['success' => 0, 'errors' => ['email' => __($status)]]);
    }
    //ADMIN
    public function adminLogin()
    {
        if (auth('admin')->check()) {
            return redirect()->route('admin.index');
        }
        return view('auth.admin-login');
    }

    public function doAdminLogin(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json(['success' => 0, 'errors' => $validation->errors()->toArray()]);
        }
        $admin = User::where('role', 'admin')->where('email', $request->email)->first();
        if (!$admin) {
            return response()->json(['success' => 0, 'errors' => ['email' =>  'Credentials does not match our records.']]);
        }
        if (!Hash::check($request->password, $admin->password)) {
            return response()->json(['success' => 0, 'errors' => ['email' =>  'Credentials does not match our records.']]);
        }
        Auth::guard('admin')->login($admin, $request->remember ?? false);
        return response()->json(['success' => 1, 'redirect' => route('admin.index')]);
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('auth.admin.login');
    }
}
