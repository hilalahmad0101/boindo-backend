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
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => '',
            'profile' => ''
        ]);

        return redirect()->route('admin.admin.index')->with('success', 'Admin created successfully!');
    }

    public function edit($id)
    {
        $admin=Admin::findOrFail($id);
        return view('admin.update', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin=Admin::findOrFail($id);
        $request->validate([
            'email' => 'required|email|unique:admins,email,' . $admin->id,
            'password' => 'sometimes|min:6',
        ]);
        $admin->update([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.admin.index')->with('success', 'Admin updated successfully!');
    }

    public function delete($id)
    {
        Admin::findOrFail($id)->delete();

        return redirect()->route('admin.admin.index')->with('success', 'Admin deleted successfully!');
    }
}
