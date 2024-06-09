@extends('layouts.app')
@section('title')
    Update Actor
@endsection
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Update Actor
        </h2>
        <form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" action="{{ route('admin.actor.update',['id'=>$actorProfile->id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
             <div>
                <input type='checkbox'  @checked($actorProfile->in_search == 1) name="search" /> <label style="color:white">Is you want in searching</label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input type="text" name="name" value="{{ $actorProfile->name }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Profession Separated by Comma(,)</span>
                    <input type="text" value="{{ $actorProfile->profession }}" name="profession"
                        placeholder="profession1,profession2" autofocus
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('profession')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Biograpy</span>
                    <input type="text" name="biograpy" value="{{ $actorProfile->biograpy }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('biograpy')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>


            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Image</span>
                <input type="file" name="image"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('image')
                    <span style="color: red">{{ $message }}</span>
                @enderror
                <img src="{{ asset('storage') }}/{{ $actorProfile->image }}" style='width:100px' alt="">
            </label>
            <div class="flex mt-6">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Create Actor</span>
                </button>
            </div>
        </form>
    </div>
@endsection
