@extends('layouts.new_app')
@section('title')
    List OnBoarding
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">NOTIFICATION LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Notification</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($notifications) }}</span>
                    </p>
                    <div class="flex items-center mt-3 md:mt-0">
                        <div class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                            <img src="{{ asset('images/search.png') }}" alt="">
                            <input type="text" placeholder="Search"
                                class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                        </div>
                        <a href="{{ route('admin.notification.create') }}"
                            class=" ml-[29px] px-4 py-2 bg-white rounded-lg justify-start items-center gap-2 inline-flex text-black text-base font-bold   leading-normal">
                            <img src="{{ asset('images/plus.svg') }}" alt="">
                            <span>Add</span>
                        </a>
                    </div>
                </div>
            </div>


            <div class="mt-8  overflow-x-scroll xl:overflow-hidden ">
                <table class="table-auto w-[1000px] xl:w-full rounded-md ">
                    <thead class="bg-[#FFFFFF33] rounded-tl-lg rounded-tr-lg">
                        <tr class="rounded-md">
                            <th
                                class="px-6 py-3 text-left  text-white border-b border-r border-t rounded-tl-md border-[#FFFFFF33]">
                                Name</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Date</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#383838]">
                        @foreach ($notifications as $notification)
                            <tr>
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4">
                                    {{ $notification->title }}
                                </td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ date('Y M d', strtotime($notification->created_at)) }}</td>
                                <td class="border-b border-[#FFFFFF33] px-6 py-4">
                                    <a href="{{ route('admin.notification.delete', $notification->id) }}">
                                        <img src="{{ asset('images/trash.svg') }}" alt="">
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-[45px] mb-[50px]">
                {{ $notifications->links() }}
            </div> 
        </div>
    </div>
@endsection
