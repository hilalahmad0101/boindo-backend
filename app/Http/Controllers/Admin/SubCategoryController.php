<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function index(): View
    {
        // list of item 
        $categories = SubCategory::latest()->paginate(10);
        return view('admin.sub_category.index', compact('categories'));
    }
    function create(): View
    {
        // create function 
        return view('admin.sub_category.create');
    }
    function store(Request $request): RedirectResponse
    {
        // to store some data 
        $validate = $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);
        SubCategory::create($validate);
        return redirect()->route('admin.sub-category.index')->with('success', 'Sub Category add successfully');
    }
    function edit($id): View
    {
        //get data by id 

        $category = SubCategory::findOrFail($id);
        return view('admin.sub_category.update', compact('category'));
    }
    function update(Request $request, $id): RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);
        SubCategory::where('id', $id)->update($validate);
        return redirect()->route('admin.sub-category.index')->with('success', 'Sub Category Update successfully');
    }
    function delete($id): RedirectResponse
    {
        SubCategory::findOrFail($id)->delete();
        return redirect()->route('admin.sub-category.index')->with('success', 'Sub Category Delete successfully');
    }
}
