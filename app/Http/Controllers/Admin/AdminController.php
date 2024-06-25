<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        return view('admin.index', compact('admins'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $admins = Admin::latest()->where('name','LIKE',"%{$searchTerm}%")->orWhere('email','LIKE',"%{$searchTerm}%")->paginate(10);
        $admins->appends(['search' => $searchTerm]);
        return view('admin.index', compact('admins'));
    }


    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'profile' => ''
        ]);

        return redirect()->route('admin.admin.index')->with('success', 'Admin created successfully!');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.update', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'sometimes|min:6',
        ]);
        $admin->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,

        ]);

        return redirect()->route('admin.admin.index')->with('success', 'Admin updated successfully!');
    }

    public function delete($id)
    {
        Admin::findOrFail($id)->delete();

        return redirect()->route('admin.admin.index')->with('success', 'Admin deleted successfully!');
    }

    public function resetPassword($id)
    {
        return view('admin.reset-password',compact('id'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:6',
        ]);
        $admin = Admin::findOrFail($id);
        $admin->update([
            'password' =>  Hash::make($request->password),
        ]);

        return redirect('/admin/list')->with('success', 'Password updated successfully!');
    }
}
