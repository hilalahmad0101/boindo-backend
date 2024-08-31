<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    function index(): View
    {
        // list of item 
        $categories = SubCategory::latest()->get();
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
        $validate['is_checkbox'] = $request->is_checkbox == "on" ? 1 : 0;
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
        $validate['is_checkbox'] = $request->is_checkbox == "on" ? 1 : 0;
        SubCategory::where('id', $id)->update($validate);
        return redirect()->route('admin.sub-category.index')->with('success', 'Sub Category Update successfully');
    }
    function delete($id): RedirectResponse
    {
        DB::transaction(function () use ($id) {
            // Retrieve the sub-category and its contents
            $contents = Content::whereSubCatId($id)->get();

            // Delete each content
            foreach ($contents as $content) {
                $content->delete();
            }

            // Finally, delete the sub-category
            SubCategory::findOrFail($id)->delete();
        });
        return redirect()->route('admin.sub-category.index')->with('success', 'Sub Category Delete successfully');
    }
}
