@extends('layouts.new_app')
@section('title')
    List Advertising
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">ADVERTISING LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Advertisment</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex text-white text-sm font-semibold leading-tight">{{ count($jingles) }}</span>
                    </p>
                    <div class="flex items-center mt-3 md:mt-0">
                        <form class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                            <img src="{{ asset('images/search.png') }}" alt="">
                            <input type="text" placeholder="Search" id="search"
                                class="placeholder:text-white placeholder:font-bold text-white ml-2 w-full bg-transparent outline-none border-none">
                        </form>
                        <a href="{{ route('admin.jingle.create') }}"
                            class="ml-[29px] px-4 py-2 bg-white rounded-lg justify-start items-center gap-2 inline-flex text-black text-base font-bold leading-normal">
                            <img src="{{ asset('images/plus.svg') }}" alt="">
                            <span>Add</span>
                        </a>
                    </div>
                </div>
            </div>
           <div id="getJingles"></div>
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
                url: "/admin/jingle/getJingles?page=" + page,
                type: 'GET',
                success: function(data) {
                    $('#getJingles').html(data.data);
                }
            });
        }

        $(document).on('keyup', '#search', function() {
            let page=1;
            $.ajax({
                url: "/admin/jingle/search?page=" + page,
                data:{
                    "search":$(this).val(),
                },
                type: 'GET',
                success: function(data) {
                    $('#getJingles').html(data.data);
                }
            });
        })
        fetch_data(1)
    });
</script>
@endsection
