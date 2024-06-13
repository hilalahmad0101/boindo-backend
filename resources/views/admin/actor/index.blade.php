@extends('layouts.new_app')
@section('title')
    List Cast
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">CAST LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Cast</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($actors) }}</span>
                    </p>
                    <div class=" ">
                        <div class="relative inline-block text-left ">
                            <div class="">
                                <button type="button"
                                    class="inline-flex justify-between w-[200px]  rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-[#383838] text-sm font-medium text-gray-200 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500"
                                    id="content-listened-button" aria-expanded="true" aria-haspopup="true">
                                    <span id="content-listened-button-text">Most listened</span>
                                    <svg class="-mr-1 ml-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.707a1 1 0 011.414 0L10 11.293l3.293-3.586a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <div class="origin-top-right hidden  w-[200px]  absolute left-0 mt-2  rounded-md shadow-lg bg-[#383838] ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="content_listened_menu" aria-orientation="vertical"
                                aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <a href="#" data-type="high" id="most_views"
                                        class="text-gray-200 block px-4 py-2 text-sm" role="menuitem"
                                        tabindex="-1">Low To High</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center mt-3 md:mt-0">
                        <div class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                            <img src="{{ asset('images/search.png') }}" alt="">
                            <input type="text" placeholder="Search" id="searchInput"
                                class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                        </div>
                        <a href="{{ route('admin.actor.create') }}"
                            class=" ml-[29px] px-4 py-2 bg-white rounded-lg justify-start items-center gap-2 inline-flex text-black text-base font-bold   leading-normal">
                            <img src="{{ asset('images/plus.svg') }}" alt="">
                            <span>Add</span>
                        </a>
                    </div>
                </div>
            </div>


            <div class="mt-8  overflow-x-scroll xl:overflow-hidden ">
                <table class="table-auto w-[1000px] xl:w-full rounded-md " id="dataTable">
                    <thead class="bg-[#FFFFFF33] rounded-tl-lg rounded-tr-lg">
                        <tr class="rounded-md">
                            <th
                                class="px-6 py-3 text-left  text-white border-b border-r border-t rounded-tl-md border-[#FFFFFF33]">
                                Name</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Date</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Views</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Edit</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#383838]" id="table-body">
                        {{-- @foreach ($actors as $actor)
                            <tr>
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ asset('storage/' . $actor->image) }}"
                                            class="w-[100px] h-[100px] object-fill" alt="">
                                        <span> {{ $actor->name }} </span>
                                    </div>
                                </td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ date('Y M d', strtotime($actor->created_at)) }}</td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ $actor->views }}</td>
                                <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    <a href="{{ route('admin.actor.edit', ['id' => $actor->id]) }}">
                                        <img src="{{ asset('images/edit.svg') }}" alt="">
                                    </a>
                                </td>
                                <td class="border-b border-[#FFFFFF33] px-6 py-4">
                                    <a href="{{ route('admin.actor.delete', $actor->id) }}">
                                        <img src="{{ asset('images/trash.svg') }}" alt="">
                                    </a>

                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div class="mt-[45px] mb-[50px] flex items-center justify-between">
                <div class="mb-4 text-white" id="results-info">
                    <!-- Results info will be dynamically generated here -->
                </div>
                <nav class="mt-4 flex space-x-4" id="pagination-controls">
                </nav>
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
        document.getElementById('content-listened-button').addEventListener('click', () => {
            const dropdown = document.querySelector('[role="content_listened_menu"]');
            dropdown.classList.toggle('hidden');
        });


        // Assuming you have the following variables populated in your Blade template
        let actors = @json($actors);
        let editUrl = "{{ asset('images/edit.svg') }}";
        let deleteUrl = "{{ asset('images/trash.svg') }}";
        const itemsPerPage = 10;
        let currentPage = 1;
        let filteredActors = []; // Variable to hold filtered actors

        $(document).ready(function() {
            // Initial render on page load
            updateFilteredActors();
            renderTable(currentPage);
            renderPagination(filteredActors.length);
        });

        // Click handler for sorting by views (most views)
        $(document).on('click', "#most_views", function() {
            const dropdown = document.querySelector('[role="content_listened_menu"]');
            dropdown.classList.toggle('hidden');
            let type = $(this).data('type');

            // Toggle sorting direction
            if (typeof this.sortOrder === 'undefined' || this.sortOrder === 'desc') {
                // Sort actors based on 'views' property (descending)
                filteredActors.sort((a, b) => b.views - a.views);
                this.sortOrder = 'asc';
                $("#most_views").text('Low to High');
            } else {
                // Sort actors based on 'views' property (ascending)
                filteredActors.sort((a, b) => a.views - b.views);
                this.sortOrder = 'desc';
                $("#most_views").text('High to Low');
            }

            currentPage = 1; // Reset to first page when sorting changes
            renderTable(currentPage);
            renderPagination(filteredActors.length);
        });

        // Function to update filtered actors based on all filters
        function updateFilteredActors() {
            filteredActors = [...actors]; // Reset filteredActors to include all actors initially
        }

        // Function to render table rows based on current page and filtered actors
        function renderTable(page) {
            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = '';

            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedItems = filteredActors.slice(start, end);

            paginatedItems.forEach(actor => {
                let imageUrl = "{{ asset('storage/') }}/" + actor.image;
                const row = `<tr>
            <td class="border border-[#FFFFFF33] text-white px-6 py-4">
                <div class="flex items-center space-x-4">
                    <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
                    <span>${actor.name}</span>
                </div>
            </td>
            <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                ${new Date(actor.created_at).toDateString()}
            </td>
            <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                ${actor.views}
            </td>
            <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                <a href="">
                    <img src="${editUrl}" alt="">
                </a>
            </td>
            <td class="border-b border-[#FFFFFF33] px-6 py-4">
                <a href="">
                    <img src="${deleteUrl}" alt="">
                </a>
            </td>
        </tr>`;
                tableBody.insertAdjacentHTML('beforeend', row);
            });

            renderResultsInfo(start + 1, Math.min(end, filteredActors.length), filteredActors.length);
        }

        // Function to handle page change
        function changePage(page) {
            if (page < 1 || page > Math.ceil(filteredActors.length / itemsPerPage)) return;
            currentPage = page;
            renderTable(page);
            renderPagination(filteredActors.length);
        }

        // Function to render pagination controls
        function renderPagination(totalItems) {
            const paginationControls = document.getElementById('pagination-controls');
            paginationControls.innerHTML = '';

            const totalPages = Math.ceil(totalItems / itemsPerPage);

            if (currentPage > 1) {
                const prevButton = `<a href="javascript:void(0);" onclick="changePage(currentPage - 1)"
            class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
            Previous
        </a>`;
                paginationControls.insertAdjacentHTML('beforeend', prevButton);
            } else {
                const prevButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
            Previous
        </span>`;
                paginationControls.insertAdjacentHTML('beforeend', prevButton);
            }

            if (currentPage < totalPages) {
                const nextButton = `<a href="javascript:void(0);" onclick="changePage(currentPage + 1)"
            class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
            Next
        </a>`;
                paginationControls.insertAdjacentHTML('beforeend', nextButton);
            } else {
                const nextButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
            Next
        </span>`;
                paginationControls.insertAdjacentHTML('beforeend', nextButton);
            }
        }

        // Function to render results info
        function renderResultsInfo(start, end, total) {
            const resultsInfo = document.getElementById('results-info');
            resultsInfo.textContent = `Showing ${start} to ${end} of ${total} actors`;
        }
    </script>
@endsection
