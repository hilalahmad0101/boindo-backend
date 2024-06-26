<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Legal;
use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function index()
    {
        $legals = Legal::latest()->get();
        return view('admin.legal.index', compact('legals'));
    }

    public function update(Request $request, $id)
    {

        if ($request->pdf) {
            $file = $request->pdf->store('legal', 'public');
            $filename = $request->pdf->getClientOriginalName();
        }
        Legal::findOrFail($id)->update([
            'pdf' => $file
        ]);


        return to_route('admin.legal.index')->with('success', 'Legal upload successfully');
    }
}
