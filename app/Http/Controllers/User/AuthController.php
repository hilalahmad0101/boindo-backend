<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\SendMail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $code = rand(1000, 9999);
        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ios_id' => 'null',
            'code' => $code,
            'photo_url' => 'https://cdn.vectorstock.com/i/preview-1x/77/30/default-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg',
        ]);

        // Check if the user was created successfully
        if ($user) {

            $details = [
                'subject' => 'Email Verification',
                'title' => url('/') . '/user/verify/email/' . $code
            ];
            \Mail::to($request->email)->send(new SendMail($details));
            // Authenticate the user
            Auth::login($user);

            // Create a token for the authenticated user
            $token = $user->createToken('auth_token')->plainTextToken;

            // Return the response with the token
            return response()->json(['message' => 'Registration successful,Check your mail', 'token' => $token, 'success' => true], 201);
        }

        // Return an error response if the user creation fails
        return response()->json(['message' => 'User creation failed', 'success' => false], 500);
    }

    public function google_register(Request $request)
    {

        $google_user = User::whereEmail($request->email)->first();
        if ($google_user) {
            $token = $google_user->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'Login successful', 'token' => $token, 'success' => true], 201);
        } else {
            // Create a new user
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make('null'),
                'ios_id' => 'null',
                'is_verified' => 1,
                'is_google' => 1,
                'photo_url' => 'https://cdn.vectorstock.com/i/preview-1x/77/30/default-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg',
            ]);

            // Check if the user was created successfully
            if ($user) {

                // Authenticate the user
                Auth::login($user);

                // Create a token for the authenticated user
                $token = $user->createToken('auth_token')->plainTextToken;

                // Return the response with the token
                return response()->json(['message' => 'Registration successful', 'token' => $token, 'success' => true], 201);
            }

            // Return an error response if the user creation fails
            return response()->json(['message' => 'User creation failed', 'success' => false], 500);
        }
    }

    public function apple_register(Request $request)
    {
        $request->validate([
            'ios_id' => 'required'
        ]);
        \Log::info($request->ios_id);
        $is_ios = User::whereIosId($request->ios_id)->first();
        //dd($is_ios);
        if (!empty($is_ios)) {
            $token = $is_ios->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'Login successful', 'token' => $token, 'success' => true], 201);
        } else {

            // Create a new user
            $user = User::create([
                'email' => $request->email ?? 'no email' . rand(999, 100),
                'password' => Hash::make('null'),
                'ios_id' => $request->ios_id,
                'is_ios' => 1,
                'is_verified' => 1,
                'photo_url' => 'https://cdn.vectorstock.com/i/preview-1x/77/30/default-avatar-profile-icon-grey-photo-placeholder-vector-17317730.jpg',
            ]);

            if ($user) {
                // Authenticate the user
                Auth::login($user);

                // Create a token for the authenticated user
                $token = $user->createToken('auth_token')->plainTextToken;

                // Return the response with the token
                return response()->json(['message' => 'Registration successful', 'token' => $token, 'success' => true], 201);
            }

            // Return an error response if the user creation fails
            return response()->json(['message' => 'User creation failed', 'success' => false], 500);
        }
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'nullable|email', 
        // ]);

        $user = User::whereEmail($request->email)->first();
        if ($user->status == 0) {
            return response()->json(['success' => false, 'message' => 'Your are suspend by admin']);
        }
        // $user1=User::whereEmailAndIsGoogle($request->email,1)->first();
        $user_ios = User::whereIosId($request->ios_id)->first();
        // if($user){
        //     if($user->is_google == 1 && Hash::check()){

        //     }
        // } 
        // if($user->is_verified == 1){
        if ($user && $user->is_google == 1) {
            if ($request->password && Hash::check($user->password, $request->password)) {
                return response()->json(['message' => 'Please login with google', 'success' => false], 201);
            } else {
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json(['message' => 'Login successful', 'token' => $token, 'success' => true], 201);
            }
        } elseif ($user_ios && $user_ios->is_ios == 1) {
            $userios = User::whereEmail($user_ios->email)->first();
            $token = $userios->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'Login successful', 'token' => $token, 'success' => true], 201);
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $token = Auth::user()->createToken('auth_token')->plainTextToken;
                return response()->json(['message' => 'Login successful', 'token' => $token, 'success' => true], 201);
            } else {
                return response()->json(['message' => 'Invalid email and password',  'success' => false], 201);
            }
        }
        // }else{
        //     return response()->json(['message'=>'Please verify your email','success'=>false],201);
        // }


    }

    public function email_verified($code)
    {
        $user = User::whereCode($code)->first();
        if ($user) {
            $user->is_verified = 1;
            $user->email_verified_at = now();
            $user->save();
            \Session::put('success', 'email verified successfully, now go to app and login');
            return view('email-verified', compact('code'));
        } else {
            return abort(404);
        }
    }

    public function deleteAccount()
    {
        User::findOrFail(auth()->id())->delete();
        return response()->json(['message' => 'Account Delete successfully', 'success' => true], 201);
    }

    public function forget_password(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if ($user) {
            $code = rand(9999, 1000);
            $user->code = $code;
            $user->save();

            $details = [
                'subject' => 'Forget Password',
                'title' => url('/') . '/user/change/password/' . $code
            ];
            \Mail::to($request->email)->send(new SendMail($details));
            return response()->json(['success' => true, 'message' => 'Reset Password Link sent to your Email.Please Check your Email.'], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'Email is not registered']);
        }
    }

    public function change_password($code)
    {
        $user = User::whereCode($code)->first();
        if ($user) {
            return view('change-password', compact('code'));
        } else {
            return abort(404);
        }
    }

    public function update_password(Request $request, $code)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $user = User::whereCode($code)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password change successfully');
        } else {
            return abort(404);
        }
    }
}
