<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Onboarding;
use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    function index()
    {
        $onboardings = Onboarding::latest()->get();
        return view('admin.onboarding.index', compact('onboardings'));
    }
    function create()
    {
        return view('admin.onboarding.create');
    }
    function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image'
        ]);
        $image = "";
        if ($request->file('image')) {
            $image = $request->file('image')->store('onboarding/image', 'public');
        }
        Onboarding::create([
            'image' => $image
        ]);
        return redirect()->route('admin.onboarding.index')->with('success', 'Onboarding Add Successfully');
    }
    function edit($id)
    {
        $onboarding = Onboarding::findOrFail($id);
        return view('admin.onboarding.update', compact('onboarding'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image'
        ]);
        $image = "";
        $onboarding = Onboarding::findOrFail($id);
        if ($request->file('image')) {
            $image = $request->file('image')->store('onboarding/image', 'public');
        } else {
            $image = $onboarding->image;
        }
        $onboarding->update([
            'image' => $image
        ]);
        return redirect()->route('admin.onboarding.index')->with('success', 'Onboarding Update Successfully');
    }
    function delete($id)
    {
        Onboarding::findOrFail($id)->delete();
        return redirect()->route('admin.onboarding.index')->with('success', 'Onboarding Delete Successfully');
    }
}
