@extends('layouts.new_app')
@section('title')
    List Reviews
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">USER REVIEWS</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>User Reviews</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($reviews) }}</span>
                    </p>
                    <div  class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                        <img src="{{ asset('images/search.png') }}" alt="">
                        <input type="text" placeholder="Search" id="search" 
                            class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                    </div>
                </div>
            </div>


        <div id="getReviews"></div>
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
                url: "/admin/review/getReviews?page=" + page,
                type: 'GET',
                success: function(data) {
                    $('#getReviews').html(data.data);
                }
            });
        }

        $(document).on('keyup', '#search', function() {
            let page=1;
            $.ajax({
                url: "/admin/review/search?page=" + page,
                data:{
                    "search":$(this).val(),
                },
                type: 'GET',
                success: function(data) {
                    $('#getReviews').html(data.data);
                }
            });
        })
        fetch_data(1)
    });
</script>
@endsection