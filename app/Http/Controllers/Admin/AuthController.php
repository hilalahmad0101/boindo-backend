<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|exists:admins',
            'password' => 'required',
        ]);
        $admins = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($admins) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->route('admin.login')->with('error', 'Invalid username and password');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return to_route('admin.login')->with('success','Logout successfully');
    }
    
    public function forget_password_view(){
        return view('admin.auth.forget-password');
    }
    
    public function forget_password(Request $request){
        $request->validate([
            'email'=>'required|email']);
        $user=Admin::whereEmail($request->email)->first();
        if($user){
            $code=rand(9999,1000);
            $user->code=$code;
            $user->save();

             $details=[
                'title'=>url('/').'/admin/change/password/'.$code    
            ];
            \Mail::to($request->email)->send(new SendMail($details));
            return redirect()->back()->with('success','Please check your mail');
        }else{
            return redirect()->back()->with('error','Email is not found');
        }
    }
    
    public function change_password($code){
        $user=Admin::whereCode($code)->first();
        if($user){
            return view('admin.auth.change-password',compact('code'));
        }else{
            return abort(404);
        }
    }
    
    public function update_password(Request $request,$code){
        $request->validate([ 
            'password'=>'required|confirmed'
        ]);
         $user=Admin::whereCode($code)->first();
            if($user){
                $user->password=Hash::make($request->password);
                $user->save();
              return to_route('admin.login')->with('success','Password change successfully');
            }else{
                return abort(404);
            }
    }
}
