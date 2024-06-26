@extends('layouts.new_app')
@section('title')
    List Admin
@endsection
@section('content')
    <!-- MAIN AREA -->
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">ADMIN LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Admin</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($admins) }}</span>
                    </p>
                    <div class="flex items-center mt-3 md:mt-0">
                        <div 
                            class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                            <img src="{{ asset('images/search.png') }}" alt="">
                            <input type="text" id="search" placeholder="Search"
                                class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                        </div>
                        <a href="{{ route('admin.admin.create') }}"
                            class=" hover:bg-white/95  ml-[29px] px-4 py-2 bg-white rounded-lg justify-start items-center gap-2 inline-flex text-black text-base font-bold   leading-normal">
                            <img src="{{ asset('images/plus.svg') }}" alt="">
                            <span>Add</span>
                        </a>
                    </div>
                </div>
            </div>


            <div id="getAdmins"></div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $(document).on('click', '#pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "/admin/getAdmins?page=" + page,
                    type: 'GET',
                    success: function(data) {
                        $('#getAdmins').html(data.data);
                    }
                });
            }

            $(document).on('keyup', '#search', function() {
                let page=1;
                $.ajax({
                    url: "/admin/search?page=" + page,
                    data:{
                        "search":$(this).val(),
                    },
                    type: 'GET',
                    success: function(data) {
                        $('#getAdmins').html(data.data);
                    }
                });
            })
            fetch_data(1)
        });
    </script>
@endsection
