<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jingle;
use Illuminate\Http\Request;

class JingleController extends Controller
{
    public function index()
    {
        $jingles = Jingle::latest()->paginate(10);
        return view('admin.jingle.index', compact('jingles'));
    }

    public function create()
    {
        return view('admin.jingle.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'audio' => 'required',
            'image' => 'required',
        ]);

        $image = "";
        if ($request->file('image')) {
            $image = $request->file('image')->store('jingle/image', 'public');
        }

        $audio = "";
        if ($request->file('audio')) {
            $audio = $request->file('audio')->store('jingle/audio', 'public');
        }

        $jingle = new Jingle();
        $jingle->audio = $audio;
        $jingle->image = $image;
        $jingle->title = $request->title;
        $jingle->save();
        return to_route('admin.jingle.index')->with('success', 'Jingle add successfully');
    }


    public function edit($id)
    {
        $jingle = Jingle::findOrFail($id);
        return view('admin.jingle.update', compact('jingle'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',  
        ]);
        $jingle = Jingle::findOrFail($id);

        $image = "";
        if ($request->file('image')) {
            $image = $request->file('image')->store('jingle/image', 'public');
        } else {
            $image = $jingle->image;
        }

        $audio = "";
        if ($request->file('audio')) {
            $audio = $request->file('audio')->store('jingle/audio', 'public');
        } else {
            $audio = $jingle->audio;
        }


        $jingle->audio = $audio;
        $jingle->image = $image;
        $jingle->title = $request->title;
        $jingle->save();
        return to_route('admin.jingle.index')->with('success', 'Jingle Update successfully');
    }


    public function delete($id)
    {
        $jingle = Jingle::destroy($id);
        return to_route('admin.jingle.index')->with('success', 'Jingle Delete successfully');
    }


    public function suspend($id)
    {
        $jingle = Jingle::findOrFail($id);
        if($jingle->status == 0){
            $jingle->status = 1;
            $jingle->save();
            return to_route('admin.jingle.index')->with('success', 'User Unsuspend successfully');
        }else{
            $jingle->status = 0;
            $jingle->save();
            return to_route('admin.jingle.index')->with('success', 'User suspend successfully');
        }
       
    }
}
