@extends('layouts.app')
@section('title')
    Crate Admin
@endsection
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Crate Admin
        </h2>
        <form method="POST" action="{{ route('admin.admin.store') }}"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input name="email" type="email"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('email')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" type="password"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('password')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <div class="flex mt-6">
                <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Create Admin</span>
                </button>
            </div>
        </form>
    </div>
@endsection
