<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(): View
    {
        $users = User::latest()->paginate(10);
        return view('admin.users', compact('users'));
    }

    function delete($id)
    {
        User::findOrFail($id)->delete();
        return to_route('admin.user.index')->with('success', 'Delete successfully');
    }

    public function suspend($id)
    {
        $user = User::findOrFail($id);
        if($user->status == 0){
            $user->status = 1;
            $user->save();
            return to_route('admin.user.index')->with('success', 'User Unsuspend successfully');
        }else{
            $user->status = 0;
            $user->save();
            return to_route('admin.user.index')->with('success', 'User suspend successfully');
        }
       
    }
}
