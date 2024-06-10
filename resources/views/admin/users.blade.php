@extends('layouts.new_app')
@section('title')
    List Users
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">USERS LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>User</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($users) }}</span>
                    </p>
                    
                </div>
            </div>


            <div class="mt-8  overflow-x-scroll xl:overflow-hidden ">
                <table class="table-auto w-[1000px] xl:w-full rounded-md ">
                    <thead class="bg-[#FFFFFF33] rounded-tl-lg rounded-tr-lg">
                        <tr class="rounded-md">
                            <th class="px-6 py-3 text-left  text-white border border-[#FFFFFF33]">Email</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Date</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Del</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Sus</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Email</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#383838]">
                        @foreach ($users as $user)
                            <tr>
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $user->email }}</td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ date('Y M d', strtotime($user->created_at)) }}</td>
                                <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    <a href="{{ route('admin.user.delete', ['id' => $user->id]) }}">
                                        <img src="{{ asset('images/trash.svg') }}"  alt="">
                                    </a>
                                </td>
                                <td class="border-b border-[#FFFFFF33] px-6 py-4 text-center">
                                   <a href="{{ route('admin.user.suspend', ['id'=>$user->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 14 20" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 0H4C5.10457 0 6 0.89543 6 2V18C6 19.1046 5.10457 20 4 20H2C0.89543 20 0 19.1046 0 18V2C0 0.89543 0.89543 0 2 0ZM10 0H12C13.1046 0 14 0.89543 14 2V18C14 19.1046 13.1046 20 12 20H10C8.89543 20 8 19.1046 8 18V2C8 0.89543 8.89543 0 10 0ZM2 2V18H4V2H2ZM10 2V18H12V2H10Z" fill="white"/>
                                      </svg>
                                   </a>
                                </td>
                                <td class="border-b border-[#FFFFFF33] px-6 py-4 text-center">
                                    <a href="{{ route('admin.send.mail.view', $user->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M4.6875 6.75L11.3596 11.5403C11.7449 11.8168 12.2551 11.8168 12.6404 11.5403L19.3125 6.75M5.25 19H18.75C19.9926 19 21 17.9553 21 16.6667V7.33333C21 6.04467 19.9926 5 18.75 5H5.25C4.00736 5 3 6.04467 3 7.33333V16.6667C3 17.9553 4.00736 19 5.25 19Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-[45px] mb-[50px]">
               {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
