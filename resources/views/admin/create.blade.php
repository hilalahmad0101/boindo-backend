@extends('layouts.new_app')
@section('title')
    Crate Admin
@endsection
@section('content')
    {{-- <div class="container px-6 mx-auto grid">
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
    </div> --}}


    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">CREATE ADMIN</h1>
        <div>
            <div class="mt-12">
                <form method="POST" action="{{ route('admin.admin.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div>
                            <label for="" class="text-neutral-50 text-2xl font-black">Name</label>
                            <input type="text" placeholder="Name" name="name"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="" class="text-neutral-50 text-2xl font-black">Email</label>
                            <input type="email" placeholder="Email" name="email"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                                @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                        </div>
                        <div></div>
                        <div class="mt-[60px]">
                            <label for="" class="text-neutral-50 text-2xl font-black">Password</label>
                            <input type="password" placeholder="Password" name="password"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                                @error('password')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div></div>
                        <div class="flex items-center justify-end space-x-9 mt-[76px]">
                            <button onclick="window.location.href='{{ route('admin.admin.index') }}'" type="button"
                                class="py-2 px-12 rounded-xl border border-white text-center text-slate-50 text-base font-black leading-7 tracking-wide">Cancel</button>
                            <button type="submit"
                                class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
