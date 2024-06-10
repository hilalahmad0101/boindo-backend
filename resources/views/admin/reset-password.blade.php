@extends('layouts.new_app')
@section('title')
    Rest Password
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">RESET ADMIN PASSWORD</h1>
        <div>
            <div class="mt-12">
                <form method="POST" action="{{ route('admin.admin.update.password', ['id' => $id]) }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
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
                                class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
