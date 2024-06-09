@extends('layouts.app')
@section('title')
    Update Sub Category
@endsection
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Update Sub Category
        </h2>
        <form method="POST" action="{{ route('admin.sub-category.update',['id'=>$category->id]) }}"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input name="name" value="{{ $category->name }}" type="text"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('name')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>


            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Select Category
                </span>
                <select name="category"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <option value="">Select Category</option>
                    <option value="play" @selected($category->category == 'play')>Play</option>
                    <option value="short stories" @selected($category->category == 'short stories')>Short Stories</option>
                </select>
                @error('category')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>


            <div class="flex mt-6">
                <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Update Sub Category</span>
                </button>
            </div>
        </form>
    </div>
@endsection
