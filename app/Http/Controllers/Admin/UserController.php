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
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $users = User::latest()->where('name', 'LIKE', "%{$searchTerm}%")->orWhere('email', 'LIKE', "%{$searchTerm}%")->orWhere('email', 'LIKE', "%{$searchTerm}%")->paginate(10);
        $users->appends(['search' => $searchTerm]);
        $output = view('components.get-users', compact('users'))->render();
        return response()->json(['data' => $output]);
    }


    public function getUsers(Request $request)
    {
        $users = User::latest()->paginate(10);
        // $users->appends(['search' => $searchTerm]);
        $output = view('components.get-users', compact('users'))->render();
        return response()->json(['data' => $output]);
    }


    function delete($id)
    {
        User::findOrFail($id)->delete();
        return to_route('admin.user.index')->with('success', 'Delete successfully');
    }

    public function suspend($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 0) {
            $user->status = 1;
            $user->save();
            return to_route('admin.user.index')->with('success', 'User Unsuspend successfully');
        } else {
            $user->status = 0;
            $user->save();
            return to_route('admin.user.index')->with('success', 'User suspend successfully');
        }
    }
}
