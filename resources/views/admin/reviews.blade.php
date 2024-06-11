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
                    <div class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                        <img src="{{ asset('images/search.png') }}" alt="">
                        <input type="text" placeholder="Search" id="searchInput" 
                            class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                    </div>
                </div>
            </div>


            <div class="mt-8  overflow-x-scroll xl:overflow-hidden ">
                <table class="table-auto w-[1000px] xl:w-full rounded-md " id="dataTable">
                    <thead class="bg-[#FFFFFF33] rounded-tl-lg rounded-tr-lg">
                        <tr class="rounded-md">
                            <th class="px-6 py-3 text-left  text-white border border-[#FFFFFF33]">User Email</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Song</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Star</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Message</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Date</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#383838]">
                        @foreach ($reviews as $review)
                            <tr>
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $review->user->email }}</td>
                                @if ($review->content)
                                    <td class="border border-[#FFFFFF33] text-white  px-6 py-4">
                                        {{ $review->contents->title }}
                                    </td>
                                @endif
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $review->star }}</td>
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $review->content }}</td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ date('Y M d', strtotime($review->created_at)) }}</td>
                                <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    <a href="{{ route('admin.review.delete', ['id' => $review->id]) }}">
                                        <img src="{{ asset('images/trash.svg') }}" alt="">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-[45px] mb-[50px]">
                {{ $reviews->links() }}
                {{-- <div class="flex md:flex-row flex-col items-center justify-between">
                    <p class=" text-white text-base font-semibold  leading-tight">Showing 1 to 9 of 9 results</p>
                    <div class="flex items-center space-x-3">
                        <button
                            class="px-4 py-2 rounded-lg border-2 border-white justify-start items-center gap-2 inline-flex">
                            <img src="../images/back.svg" alt="">
                            <p class=" text-white text-base font-bold leading-normal">Previous</p>
                        </button>
                        <button
                            class="px-4 py-2 rounded-lg border-2 border-white justify-start items-center gap-2 inline-flex">
                            <p class=" text-white text-base font-bold leading-normal">Next</p>
                            <img src="../images/next.png" alt="">
                        </button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('dataTable');
            const tbody = table.getElementsByTagName('tbody')[0];
            const rows = tbody.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                const filter = searchInput.value.toLowerCase();
                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    let rowContainsFilter = false;

                    for (let j = 0; j < cells.length; j++) {
                        if (cells[j]) {
                            const cellText = cells[j].textContent || cells[j].innerText;
                            if (cellText.toLowerCase().indexOf(filter) > -1) {
                                rowContainsFilter = true;
                                break;
                            }
                        }
                    }

                    if (rowContainsFilter) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection