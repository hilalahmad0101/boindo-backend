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
        $users=User::all();
        return view('admin.users',compact('users'));
    }

    function delete($id)  {
        User::findOrFail($id)->delete();
        return to_route('admin.user.index')->with('success','Delete successfully');
    }
}
