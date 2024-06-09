<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActorProfile;
use Illuminate\Http\Request;

class ActorProfileController extends Controller
{
    public function index()
    {
        $actors = ActorProfile::latest()->get();
        return view("admin.actor.index", compact('actors'));
    }

    public function create()
    {
        return view('admin.actor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'profession' => 'required',
            'image' => 'required|image',
            'biograpy' => 'required'
        ]);
        $filename = "";
        if ($request->file('image')) {
            $filename = $request->file('image')->store('profile', 'public');
        } 
        ActorProfile::create([
            'name' => $request->name,
            'image' => $filename,
            'biograpy' => $request->biograpy,
            'in_search'=>$request->search == "on" ? 1 : 0,
            'profession' => $request->profession,
        ]);

        return to_route('admin.actor.index')->with('success', 'Profile create successfully');
    }

    public function edit($id)
    {
        $actorProfile = ActorProfile::findOrFail($id);
        return view('admin.actor.update', compact('actorProfile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image',
            'profession' => 'required',
            'biograpy' => 'required',
        ]);


        $profile = ActorProfile::findOrFail($id);

        $filename = "";
        if ($request->file('image')) {
            $filename = $request->file('image')->store('profile', 'public');
        } else {
            $filename = $profile->image;
        }
        $profile->update([
            'name' => $request->name,
            'image' => $filename,
            'profession' => $request->profession,
            'biograpy' => $request->biograpy,
            'in_search'=>$request->search == "on" ? 1 : 0,
        ]);

        return to_route('admin.actor.index')->with('success', 'Profile update successfully');
    }

    public function delete($id)
    {
        ActorProfile::findOrFail($id)->delete();
        return to_route('admin.actor.index')->with('success', 'Profile delete successfully');
    }
}
