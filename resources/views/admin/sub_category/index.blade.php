@extends('layouts.new_app')
@section('title')
    List Sub Category
@endsection
@section('content')
    {{-- <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            style="display: flex; align-items: center;justify-content: space-between;">
            List Sub Category

            <a href="{{ route('admin.sub-category.create') }}"
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                aria-label="Delete">
                <span>Create New</span>
                <svg style="margin-left: 10px" class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                    </path>
                </svg>
            </a>
        </h2>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div style='display:flex;align-items:center;justify-content:center'>
                    <label for="category" style='color:white !important'>Category:</label>
                    <select id="category-filter" style="border: 1px solid white;
                                                        background: transparent;
                                                        padding: 4px 20px;
                                                        border-radius: 6px;
                                                        color: white; margin-right:20px">
                        <option value="" style='color:black !important'>All</option>
                        <option value="play" style='color:black !important'>Play</option>
                        <option value="short stories" style='color:black !important'>Short Shories</option>
                        <!-- Add more categories as needed -->
                    </select>  
                </div>
                <table class="w-full whitespace-no-wrap" id='sub_category_table'>
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Sub/Category Name</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($categories as $category)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $category->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            Category : {{ $category->category }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('admin.sub-category.edit', ['id'=>$category->id]) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.sub-category.delete', ['id'=>$category->id]) }}" 
                                        onclick="return confirm('Are you sure you want to delete?') ? deleteCategory(event) : false;"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                           <path fill-rule="evenodd"
                                                 d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                 clip-rule="evenodd"></path>
                                        </svg>
                                     </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function deleteCategory(event) {
           // Prevent the default link behavior to avoid navigating immediately
           event.preventDefault();
     
           // Get the URL from the anchor element
           var deleteUrl = event.currentTarget.href;
     
           // Perform the deletion by redirecting to the delete URL
           window.location.href = deleteUrl;
        }
     </script> --}}


    <!-- MAIN AREA -->
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">SUB-CATEGORY LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Sub-Category</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($categories) }}</span>
                    </p>

                    <div class="flex items-center mt-3 md:mt-0 space-x-6">
                        <div class="">
                            <div class="relative inline-block text-left ">
                                <div class="">
                                    <button type="button"
                                        class="inline-flex justify-between w-[200px]  rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-[#383838] text-sm font-medium text-gray-200 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500"
                                        id="content-category-button" aria-expanded="true" aria-haspopup="true">
                                        <span id="content-listened-button-text">Category</span>
                                        <svg class="-mr-1 ml-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.707a1 1 0 011.414 0L10 11.293l3.293-3.586a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="origin-top-right hidden  w-[200px]  absolute left-0 mt-2  rounded-md shadow-lg bg-[#383838] ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="content_category_menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="javascript:void(0);" id="searchCategory" data-category="play"
                                            class="text-gray-200 block px-4 py-2 text-sm" role="menuitem"
                                            tabindex="-1">Play</a>

                                        <a href="javascript:void(0);" id="searchCategory" data-category="short stories"
                                            class="text-gray-200 block px-4 py-2 text-sm" role="menuitem"
                                            tabindex="-1">Short Stories</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                            <img src="{{ asset('images/search.png') }}" alt="">
                            <input type="text" placeholder="Search" id="searchInput"
                                class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                        </div>
                        <a href="{{ route('admin.sub-category.create') }}"
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
                                Title</th>
                            <th class="px-6 py-3 text-left  text-white border border-[#FFFFFF33]">Date</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Edit</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#383838]" id="table-body">
                        {{-- @foreach ($categories as $category)
                            <tr>
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $category->name }}</td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ date('Y M d', strtotime($category->created_at)) }}</td>
                                <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    <a href="{{ route('admin.sub-category.edit', ['id' => $category->id]) }}">
                                        <img src="{{ asset('images/edit.svg') }}" alt="">
                                    </a>
                                </td>
                                <td class="border-b border-[#FFFFFF33] px-6 py-4">
                                    <a href="{{ route('admin.sub-category.delete', $category->id) }}">
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

        document.getElementById('content-category-button').addEventListener('click', () => {
            const dropdown = document.querySelector('[role="content_category_menu"]');
            dropdown.classList.toggle('hidden');
        });

        let categories = @json($categories);
        let editUrl = "{{ asset('images/edit.svg') }}";
        let deleteUrl = "{{ asset('images/trash.svg') }}";
        const itemsPerPage = 10;
        let currentPage = 1;
        let filteredCategories = [...categories]; // Start with all categories

        $(document).ready(function() {
            renderTable(currentPage);
            renderPagination(filteredCategories.length);
        });

        // Click handler for category filtering
        $(document).on('click', "#searchCategory", function() {
            let category = $(this).data('category');
            updateFilteredContentsByCategory(category);
            $("#content-listened-button-text").text(category)
            const dropdown = document.querySelector('[role="content_category_menu"]');
            dropdown.classList.toggle('hidden');
            currentPage = 1; // Reset to first page when filter changes
            renderTable(currentPage);
            renderPagination(filteredCategories.length);
        });
 

        // Function to update filtered categories based on category filter
        function updateFilteredContentsByCategory(category) {
            filteredCategories = categories.filter(cat => cat.category === category);
        }
 

        // Function to render table rows based on current page and filtered categories
        function renderTable(page) {
            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = '';

            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedItems = filteredCategories.slice(start, end);

            paginatedItems.forEach(category => {
                const row = `<tr>
                <td class="border border-[#FFFFFF33] text-white px-6 py-4">${category.name}</td>
                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">${new Date(category.created_at).toLocaleDateString()}</td>
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

            renderResultsInfo(start + 1, Math.min(end, filteredCategories.length), filteredCategories.length);
        }

        // Function to handle page change
        function changePage(page) {
            if (page < 1 || page > Math.ceil(filteredCategories.length / itemsPerPage)) return;
            currentPage = page;
            renderTable(page);
            renderPagination(filteredCategories.length);
        }

        // Function to render pagination controls
        function renderPagination(totalItems) {
            const paginationControls = document.getElementById('pagination-controls');
            paginationControls.innerHTML = '';

            const totalPages = Math.ceil(totalItems / itemsPerPage);

            if (currentPage > 1) {
                const prevButton = `<a href="javascript:void  (0);" onclick="changePage(currentPage - 1)"
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
            resultsInfo.textContent = `Showing ${start} to ${end} of ${total} categories`;
        }
    </script>
@endsection
