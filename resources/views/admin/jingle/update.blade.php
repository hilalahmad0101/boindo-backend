@extends('layouts.app')
@section('title')
    update Jingle
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/tagify.css') }}">

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            update Jingle
        </h2>
        <form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" action="{{ route('admin.jingle.update',['id'=>$jingle->id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Title</span>
                <input type="text" name="title" value="{{$jingle->title}}"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('title')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>


            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Image</span>
                <input type="file" name="image"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    <img src="{{ asset('storage') }}/{{ $jingle->image }}"
                                                    style="width: 80px;" alt="">
                @error('image')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>


            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Audio</span>
                <input type="file" name="audio"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                
                     <div>
                                            <audio controls>
                                              <source src="{{asset('storage')}}/{{$jingle->audio}}" > 
                                            </audio>
                                        </div>   @error('audio')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <div class="flex mt-6">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Create Jingle</span>
                </button>
            </div>
        </form>
    </div>
@endsection
