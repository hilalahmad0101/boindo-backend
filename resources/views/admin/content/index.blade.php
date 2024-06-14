@extends('layouts.new_app')
@section('title')
    List Content
@endsection
@section('content')
    {{-- <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            style="display: flex;align-items: center;justify-content: space-between">
            List Content
            <a href="{{ route('admin.content.create') }}"
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
                    
                    <label for="subcategory" style='color:white !important'>Sub-Category:</label>
                    <select id="subcategory-filter" style="border: 1px solid white;
                                                        background: transparent;
                                                        padding: 4px 20px;
                                                        border-radius: 6px;
                                                        color: white; width:200px;margin-right:20px">
                        <option value="" style='color:black !important'>All</option>
                        @php
                        $categories=\App\Models\SubCategory::latest()->get();
                        @endphp
                        @foreach ($categories as $category)
                        <option value="{{$category->name}}" style='color:black !important'>{{$category->name}}</option> 
                        @endforeach
                    </select>
                </div>
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Play</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Sub Category</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($contents as $content)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $content->title }}</p>
                                            
                                            
                                        </div>
                                    </div>
                                </td>
                          
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $content->plays }}</p>
                                        </div>
                                    </div>
                                </td>
                                  <td>
                                <p class="font-semibold">Category : {{ $content->category }}</p>
                            </td>
                            <td>
                                <p class="font-semibold">Sub Category : {{ $content->sub_category->name }}</p>
                            </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold"><img src="{{ asset('storage') }}/{{ $content->image }}"
                                                    style="width: 80px;" alt=""></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('admin.content.edit', ['id'=>$content->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.content.delete', ['id'=>$content->id]) }}" 
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

    <div class="mt-[134px]">
        <div class="flex md:flex-row flex-col my-4 items-center justify-between">
            <h1 class="text-neutral-50 text-4xl font-black ">CONTENT LIST</h1>
            <div class="flex items-center mt-3 md:mt-0">
                <div class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                    <img src="{{ asset('images/search.png') }}" alt="">
                    <input type="text" placeholder="Search" id="searchInput"
                        class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                </div>
                <a href="{{ route('admin.content.create') }}"
                    class=" ml-[29px] px-4 py-2 bg-white rounded-lg justify-start items-center gap-2 inline-flex text-black text-base font-bold   leading-normal">
                    <img src="{{ asset('images/plus.svg') }}" alt="">
                    <span>Add</span>
                </a>
            </div>
        </div>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Content</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ \App\Models\Content::count() }}</span>
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-3  gap-x-4">
                        <div class=" ">
                            <div class="relative md:inline-block flex text-left ">
                                <div class="w-full md:my-0 my-5">
                                    <button type="button"
                                        class="flex justify-between md:w-[200px] w-full  rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-[#383838] text-sm font-medium text-gray-200 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500"
                                        id="content-category-button" aria-expanded="true" aria-haspopup="true">
                                        <span id="content-category-button-text">Content Category</span>
                                        <svg class="-mr-1 ml-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.707a1 1 0 011.414 0L10 11.293l3.293-3.586a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="origin-top-right hidden  md:w-[200px] w-full z-50   absolute left-0 mt-2  rounded-md shadow-lg bg-[#383838] ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="content_menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        <!-- Active: "bg-gray-100", Not Active: "" -->
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
                        <div class=" ">
                            <div class="relative md:inline-block flex text-left ">
                                <div class="w-full md:my-0 my-5">
                                    <button type="button"
                                        class="inline-flex justify-between md:w-[200px] w-full  rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-[#383838] text-sm font-medium text-gray-200 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500"
                                        id="content-sub-category-button" aria-expanded="true" aria-haspopup="true">
                                        <span id="content-sub-category-button-text">Content sub-category</span>
                                        <svg class="-mr-1 ml-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.707a1 1 0 011.414 0L10 11.293l3.293-3.586a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="origin-top-right hidden  md:w-[200px] w-full  z-50 absolute left-0 mt-2 overflow-y-scroll h-[40vh] rounded-md shadow-lg bg-[#383838] ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="content_sub_menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">
                                        @php
                                            $categories = \App\Models\SubCategory::latest()->get();
                                        @endphp
                                        @foreach ($categories as $category)
                                            <a href="#" data-id="{{ $category->id }}"
                                                data-category-name="{{ $category->name }}" id="searchSubCategory"
                                                class="text-gray-200 block px-4 py-2 text-sm" role="menuitem"
                                                tabindex="-1">{{ $category->name }}</a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class=" ">
                            <div class="relative md:inline-block flex text-left ">
                                <div class="w-full md:my-0 my-5">
                                    <button type="button"
                                        class="inline-flex justify-between md:w-[200px] w-full  rounded-md border border-gray-600 shadow-sm px-4 py-2 bg-[#383838] text-sm font-medium text-gray-200 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500"
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

                                <div class="origin-top-right hidden  md:w-[200px] w-full z-50  absolute left-0 mt-2  rounded-md shadow-lg bg-[#383838] ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="content_listened_menu" aria-orientation="vertical"
                                    aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">
                                        <a href="#" data-type="high" id="mosted_listened"
                                            class="text-gray-200 block px-4 py-2 text-sm" role="menuitem"
                                            tabindex="-1">Low To High</a>

                                    </div>
                                </div>
                            </div>
                        </div>

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
                            <th class="px-6 py-3 text-left  text-white border-b border-r border-t border-[#FFFFFF33]">
                                Category</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-r border-t border-[#FFFFFF33]">Sub
                                Category</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-r border-t border-[#FFFFFF33]">Listened</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Date</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Edit</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#383838]" id="table-body">
                        {{-- @foreach ($contents as $content)
                            <tr>
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4 space-x-3">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ asset('storage/' . $content->image) }}"
                                            class="w-[100px] h-[100px] object-fill" alt="">
                                        <span> {{ $content->title }}</span>
                                    </div>
                                </td>
                                <td class="border border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ $content->category }}</td>
                                <td class="border border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ $content->sub_category->name }}</td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ $content->plays }}</td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ date('Y M d', strtotime($content->created_at)) }}</td>
                                <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    <a href="{{ route('admin.content.edit', ['id' => $content->id]) }}">
                                        <img src="{{ asset('images/edit.svg') }}" alt="">
                                    </a>
                                </td>
                                <td class="border-b border-[#FFFFFF33] px-6 py-4">
                                    <a href="{{ route('admin.content.delete', $content->id) }}">
                                        <img src="{{ asset('images/trash.svg') }}" alt="">
                                    </a>

                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
            <div class="mt-[45px] mb-[50px] flex md:flex-row flex-col items-center justify-between">
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
        document.getElementById('content-category-button').addEventListener('click', () => {
            const dropdown = document.querySelector('[role="content_menu"]');
            dropdown.classList.toggle('hidden');
        });
        document.getElementById('content-sub-category-button').addEventListener('click', () => {
            const dropdown = document.querySelector('[role="content_sub_menu"]');
            dropdown.classList.toggle('hidden');
        });
        document.getElementById('content-listened-button').addEventListener('click', () => {
            const dropdown = document.querySelector('[role="content_listened_menu"]');
            dropdown.classList.toggle('hidden');
        });
    </script>
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

    <script>
        // let contents = @json($contents);
        // $(document).on('click', "#searchCategory", function() {
        //     const dropdown = document.querySelector('[role="content_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let category = $(this).data('category');
        //     const tableBody = document.getElementById('table-body');
        //     tableBody.innerHTML = '';
        //     const itemsPerPage = 10;
        //     let currentPage = 1;
        //     const start = (currentPage - 1) * itemsPerPage;
        //     const end = start + itemsPerPage; 
        //     const paginatedItems = contents
        //     let editUrl = "{{ asset('images/edit.svg') }}"
        //     let deleteUrl = "{{ asset('images/trash.svg') }}"
        //     paginatedItems.forEach(content => {
        //         if (content.category == category) {
        //             let imageUrl = "{{ asset('storage/') }}/" + content.image
        //             const row = `<tr>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <div class="flex items-center space-x-4">
    //                   <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
    //                   <span>${content.title}</span>
    //                 </div>
    //               </td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.category}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.sub_category.name}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.plays}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${new Date(content.created_at).toDateString()}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <a href="/edit/${content.id}"><img src="${editUrl}" alt=""></a>
    //               </td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <a href="/delete/${content.id}"><img src="${deleteUrl}" alt=""></a>
    //               </td>
    //             </tr>`;
        //             tableBody.insertAdjacentHTML('beforeend', row);
        //         }

        //     });

        //     renderResultsInfo(start + 1, Math.min(end, contents.length), contents.length);

        //     function renderPagination() {
        //         const paginationControls = document.getElementById('pagination-controls');
        //         paginationControls.innerHTML = '';

        //         const totalPages = Math.ceil(contents.length / itemsPerPage);

        //         if (currentPage > 1) {
        //             const prevButton = `<a href="javascript:void(0);" onclick="changePage(currentPage - 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </a>`;
        //             paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //         } else {
        //             const prevButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </span>`;
        //             paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //         }

        //         if (currentPage < totalPages) {
        //             const nextButton = `<a href="javascript:void(0);" onclick="changePage(currentPage + 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </a>`;
        //             paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //         } else {
        //             const nextButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </span>`;
        //             paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //         }
        //     }

        //     function renderResultsInfo(start, end, total) {
        //         const resultsInfo = document.getElementById('results-info');
        //         resultsInfo.textContent = `Showing ${start} to ${end} of ${total} results`;
        //     }

        //     function changePage(page) {
        //         if (page < 1 || page > Math.ceil(contents.length / itemsPerPage)) return;
        //         currentPage = page;
        //         renderPagination();
        //     }
        // })
        // $(document).on('click', "#searchSubCategory", function() {
        //     const dropdown = document.querySelector('[role="content_sub_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let id = $(this).data('id');
        //     const tableBody = document.getElementById('table-body');
        //     tableBody.innerHTML = '';
        //     const itemsPerPage = 10;
        //     let currentPage = 1;
        //     const start = (currentPage - 1) * itemsPerPage;
        //     const end = start + itemsPerPage; 
        //     const paginatedItems = contents.slice(start, end);
        //     let editUrl = "{{ asset('images/edit.svg') }}"
        //     let deleteUrl = "{{ asset('images/trash.svg') }}"
        //     paginatedItems.forEach(content => {
        //         if (content.sub_cat_id == id) {
        //             let imageUrl = "{{ asset('storage/') }}/" + content.image
        //             const row = `<tr>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <div class="flex items-center space-x-4">
    //                   <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
    //                   <span>${content.title}</span>
    //                 </div>
    //               </td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.category}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.sub_category.name}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.plays}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${new Date(content.created_at).toDateString()}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <a href="/edit/${content.id}"><img src="${editUrl}" alt=""></a>
    //               </td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <a href="/delete/${content.id}"><img src="${deleteUrl}" alt=""></a>
    //               </td>
    //             </tr>`;
        //             tableBody.insertAdjacentHTML('beforeend', row);
        //         }

        //     });

        //     renderResultsInfo(start + 1, Math.min(end, contents.length), contents.length);

        //     function renderPagination() {
        //         const paginationControls = document.getElementById('pagination-controls');
        //         paginationControls.innerHTML = '';

        //         const totalPages = Math.ceil(contents.length / itemsPerPage);

        //         if (currentPage > 1) {
        //             const prevButton = `<a href="javascript:void(0);" onclick="changePage(currentPage - 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </a>`;
        //             paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //         } else {
        //             const prevButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </span>`;
        //             paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //         }

        //         if (currentPage < totalPages) {
        //             const nextButton = `<a href="javascript:void(0);" onclick="changePage(currentPage + 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </a>`;
        //             paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //         } else {
        //             const nextButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </span>`;
        //             paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //         }
        //     }

        //     function renderResultsInfo(start, end, total) {
        //         const resultsInfo = document.getElementById('results-info');
        //         resultsInfo.textContent = `Showing ${start} to ${end} of ${total} results`;
        //     }

        //     function changePage(page) {
        //         if (page < 1 || page > Math.ceil(contents.length / itemsPerPage)) return;
        //         currentPage = page;
        //         renderPagination();
        //     }
        // })

        // let editUrl = "{{ asset('images/edit.svg') }}"
        // let deleteUrl = "{{ asset('images/trash.svg') }}"
        // // Extract the "plays" values into an array
        // // let playsArray = contents.map(item => item.plays);

        // // // Find the maximum and minimum values in the plays array
        // // let maxPlays = Math.max(...playsArray);
        // // let minPlays = Math.min(...playsArray);

        // // console.log("Max Plays:", maxPlays);
        // // console.log("Min Plays:", minPlays);

        // $(document).on('click', "#mosted_listened", function() {
        //     const dropdown = document.querySelector('[role="content_listened_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let type = $(this).data('type');
        //     const tableBody = document.getElementById('table-body');
        //     tableBody.innerHTML = '';
        //     const itemsPerPage = 10;
        //     let currentPage = 1;
        //     const start = (currentPage - 1) * itemsPerPage;
        //     const end = start + itemsPerPage;

        //     // Toggle sorting direction
        //     if (typeof this.sortOrder === 'undefined' || this.sortOrder === 'desc') {
        //         // Sort contents based on 'plays' property (descending)
        //         contents.sort((a, b) => b.plays - a.plays);
        //         this.sortOrder = 'asc'; // Update sort order
        //         $("#mosted_listened").text('Low to High')
        //     } else {
        //         // Sort contents based on 'plays' property (ascending)
        //         contents.sort((a, b) => a.plays - b.plays);
        //         this.sortOrder = 'desc'; // Update sort order
        //         $("#mosted_listened").text('High to Low')

        //     }

        //     const paginatedItems = contents.slice(start, end);

        //     // Render sorted items
        //     paginatedItems.forEach(content => {
        //         let imageUrl = "{{ asset('storage/') }}/" + content.image;
        //         const row = `<tr>
    //       <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //         <div class="flex items-center space-x-4">
    //           <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
    //           <span>${content.title}</span>
    //         </div>
    //       </td>
    //       <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.category}</td>
    //       <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.sub_category.name}</td>
    //       <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.plays}</td>
    //       <td class="border border-[#FFFFFF33] text-white px-6 py-4">${new Date(content.created_at).toDateString()}</td>
    //       <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //         <a href="/edit/${content.id}"><img src="${editUrl}" alt=""></a>
    //       </td>
    //       <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //         <a href="/delete/${content.id}"><img src="${deleteUrl}" alt=""></a>
    //       </td>
    //     </tr>`;
        //         tableBody.insertAdjacentHTML('beforeend', row);
        //     });

        //     renderResultsInfo(start + 1, Math.min(end, contents.length), contents.length);

        //     function renderPagination() {
        //         const paginationControls = document.getElementById('pagination-controls');
        //         paginationControls.innerHTML = '';

        //         const totalPages = Math.ceil(contents.length / itemsPerPage);

        //         if (currentPage > 1) {
        //             const prevButton = `<a href="javascript:void(0);" onclick="changePage(currentPage - 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </a>`;
        //             paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //         } else {
        //             const prevButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </span>`;
        //             paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //         }

        //         if (currentPage < totalPages) {
        //             const nextButton = `<a href="javascript:void(0);" onclick="changePage(currentPage + 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </a>`;
        //             paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //         } else {
        //             const nextButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </span>`;
        //             paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //         }
        //     }

        //     function renderResultsInfo(start, end, total) {
        //         const resultsInfo = document.getElementById('results-info');
        //         resultsInfo.textContent = `Showing ${start} to ${end} of ${total} results`;
        //     }

        //     function changePage(page) {
        //         if (page < 1 || page > Math.ceil(contents.length / itemsPerPage)) return;
        //         currentPage = page;
        //         renderPagination();
        //     }

        // });





        // const itemsPerPage = 10;
        // let currentPage = 1;

        // function renderTable(page) {
        //     const tableBody = document.getElementById('table-body');
        //     tableBody.innerHTML = '';

        //     const start = (page - 1) * itemsPerPage;
        //     const end = start + itemsPerPage;
        //     const paginatedItems = contents.slice(start, end);


        //     paginatedItems.forEach(content => {
        //         let imageUrl = "{{ asset('storage/') }}/" + content.image
        //         const row = `<tr>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <div class="flex items-center space-x-4">
    //                   <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
    //                   <span>${content.title}</span>
    //                 </div>
    //               </td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.category}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.sub_category.name}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.plays}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">${new Date(content.created_at).toDateString()}</td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <a href="/edit/${content.id}"><img src="${editUrl}" alt=""></a>
    //               </td>
    //               <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //                 <a href="/delete/${content.id}"><img src="${deleteUrl}" alt=""></a>
    //               </td>
    //             </tr>`;
        //         tableBody.insertAdjacentHTML('beforeend', row);
        //     });

        //     renderResultsInfo(start + 1, Math.min(end, contents.length), contents.length);
        // }

        // function renderPagination() {
        //     const paginationControls = document.getElementById('pagination-controls');
        //     paginationControls.innerHTML = '';

        //     const totalPages = Math.ceil(contents.length / itemsPerPage);

        //     if (currentPage > 1) {
        //         const prevButton = `<a href="javascript:void(0);" onclick="changePage(currentPage - 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </a>`;
        //         paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //     } else {
        //         const prevButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </span>`;
        //         paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //     }

        //     if (currentPage < totalPages) {
        //         const nextButton = `<a href="javascript:void(0);" onclick="changePage(currentPage + 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </a>`;
        //         paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //     } else {
        //         const nextButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </span>`;
        //         paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //     }
        // }

        // function renderResultsInfo(start, end, total) {
        //     const resultsInfo = document.getElementById('results-info');
        //     resultsInfo.textContent = `Showing ${start} to ${end} of ${total} results`;
        // }

        // function changePage(page) {
        //     if (page < 1 || page > Math.ceil(contents.length / itemsPerPage)) return;
        //     currentPage = page;
        //     renderTable(page);
        //     renderPagination();
        // }

        // // Initial render
        // renderTable(currentPage);
        // renderPagination();

        // let contents =
        //     @json($contents); // Assuming contents is initialized correctly in your PHP/Blade template
        // let editUrl = "{{ asset('images/edit.svg') }}"
        // let deleteUrl = "{{ asset('images/trash.svg') }}"
        // // $(document).ready(function() {
        // const itemsPerPage = 10;
        // let currentPage = 1;

        // // Initial render
        // renderTable(currentPage, contents);
        // renderPagination(contents.length);



        // // Click handler for searching by category
        // $(document).on('click', "#searchCategory", function() {
        //     const dropdown = document.querySelector('[role="content_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let category = $(this).data('category');

        //     const filteredContents = contents.filter(content => content.category == category);

        //     // Reset to first page when filter changes
        //     currentPage = 1;
        //     renderTable(currentPage, filteredContents);
        //     renderPagination(filteredContents.length);
        // });

        // // Click handler for searching by sub-category
        // $(document).on('click', "#searchSubCategory", function() {
        //     const dropdown = document.querySelector('[role="content_sub_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let id = $(this).data('id');

        //     const filteredContents = contents.filter(content => content.sub_cat_id == id);

        //     // Reset to first page when filter changes
        //     currentPage = 1;
        //     renderTable(currentPage, filteredContents);
        //     renderPagination(filteredContents.length);
        // });


        // // Click handler for sorting by plays (most listened)
        // $(document).on('click', "#mosted_listened", function() {
        //     const dropdown = document.querySelector('[role="content_listened_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let type = $(this).data('type');

        //     // Toggle sorting direction
        //     if (typeof this.sortOrder === 'undefined' || this.sortOrder === 'desc') {
        //         // Sort contents based on 'plays' property (descending)
        //         contents.sort((a, b) => b.plays - a.plays);
        //         this.sortOrder = 'asc';
        //         $("#mosted_listened").text('Low to High');
        //     } else {
        //         // Sort contents based on 'plays' property (ascending)
        //         contents.sort((a, b) => a.plays - b.plays);
        //         this.sortOrder = 'desc';
        //         $("#mosted_listened").text('High to Low');
        //     }

        //     renderTable(currentPage, contents);
        //     renderPagination(contents.length);
        // });

        // // Function to render table rows based on current page and filtered contents
        // // Function to render table rows based on current page and filtered contents
        // function renderTable(page, filteredContents) {
        //     const tableBody = document.getElementById('table-body');
        //     tableBody.innerHTML = '';

        //     const start = (page - 1) * itemsPerPage;
        //     const end = start + itemsPerPage;
        //     const paginatedItems = filteredContents.slice(start, end);

        //     paginatedItems.forEach(content => {
        //         let imageUrl = "{{ asset('storage/') }}/" + content.image;
        //         const row = `<tr>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <div class="flex items-center space-x-4">
    //       <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
    //       <span>${content.title}</span>
    //     </div>
    //   </td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.category}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.sub_category.name}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.plays}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${new Date(content.created_at).toDateString()}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <a href="/edit/${content.id}"><img src="${editUrl}" alt=""></a>
    //   </td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <a href="/delete/${content.id}"><img src="${deleteUrl}" alt=""></a>
    //   </td>
    // </tr>`;
        //         tableBody.insertAdjacentHTML('beforeend', row);
        //     });

        //     renderResultsInfo(start + 1, Math.min(end, filteredContents.length), filteredContents.length);
        // }

        // // Function to handle page change
        // // Function to handle page change
        // function changePage(page) {
        //     const filteredContents = getFilteredContents(); // Implement this function to get filtered contents

        //     if (page < 1 || page > Math.ceil(filteredContents.length / itemsPerPage)) return;
        //     currentPage = page;
        //     renderTable(page, filteredContents);
        //     renderPagination(filteredContents.length);
        // }

        // // Function to render pagination controls
        // function renderPagination(totalItems) {
        //     const paginationControls = document.getElementById('pagination-controls');
        //     paginationControls.innerHTML = '';

        //     const totalPages = Math.ceil(totalItems / itemsPerPage);

        //     if (currentPage > 1) {
        //         const prevButton = `<a href="javascript:void(0);" onclick="changePage(currentPage - 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </a>`;
        //         paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //     } else {
        //         const prevButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Previous
    //                     </span>`;
        //         paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //     }

        //     if (currentPage < totalPages) {
        //         const nextButton = `<a href="javascript:void(0);" onclick="changePage(currentPage + 1)"
    //                       class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </a>`;
        //         paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //     } else {
        //         const nextButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //                       Next
    //                     </span>`;
        //         paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //     }
        // }

        // // Function to render results info
        // function renderResultsInfo(start, end, total) {
        //     const resultsInfo = document.getElementById('results-info');
        //     resultsInfo.textContent = `Showing ${start} to ${end} of ${total} results`;
        // }


        // // });

        // let contents =
        //     @json($contents); // Assuming contents is initialized correctly in your PHP/Blade template
        // let editUrl = "{{ asset('images/edit.svg') }}";
        // let deleteUrl = "{{ asset('images/trash.svg') }}";
        // const itemsPerPage = 10;
        // let currentPage = 1;
        // let filteredContents = []; // Variable to hold filtered contents

        // // Initial render
        // renderTable(currentPage);
        // renderPagination(contents.length);

        // // Click handler for searching by category
        // $(document).on('click', "#searchCategory", function() {
        //     const dropdown = document.querySelector('[role="content_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let category = $(this).data('category');

        //     updateFilteredContentsByCategory(category);

        //     // Reset to first page when filter changes
        //     currentPage = 1;
        //     renderTable(currentPage);
        //     renderPagination(filteredContents.length);
        // });

        // // Click handler for searching by sub-category
        // $(document).on('click', "#searchSubCategory", function() {
        //     const dropdown = document.querySelector('[role="content_sub_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let subCategoryId = $(this).data('id');

        //     updateFilteredContentsBySubCategory(subCategoryId);

        //     // Reset to first page when filter changes
        //     currentPage = 1;
        //     renderTable(currentPage);
        //     renderPagination(filteredContents.length);
        // });

        // // Click handler for sorting by plays (most listened)
        // $(document).on('click', "#mosted_listened", function() {
        //     const dropdown = document.querySelector('[role="content_listened_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let type = $(this).data('type');

        //     // Toggle sorting direction
        //     if (typeof this.sortOrder === 'undefined' || this.sortOrder === 'desc') {
        //         // Sort contents based on 'plays' property (descending)
        //         contents.sort((a, b) => b.plays - a.plays);
        //         this.sortOrder = 'asc';
        //         $("#mosted_listened").text('Low to High');
        //     } else {
        //         // Sort contents based on 'plays' property (ascending)
        //         contents.sort((a, b) => a.plays - b.plays);
        //         this.sortOrder = 'desc';
        //         $("#mosted_listened").text('High to Low');
        //     }

        //     renderTable(currentPage);
        //     renderPagination(filteredContents.length);
        // });

        // // Function to update filtered contents based on category filter
        // function updateFilteredContentsByCategory(category) {
        //     filteredContents = contents.filter(content => content.category == category);
        // }

        // // Function to update filtered contents based on sub-category filter
        // function updateFilteredContentsBySubCategory(subCategoryId) {
        //     filteredContents = contents.filter(content => content.sub_cat_id == subCategoryId);
        // }

        // // Function to render table rows based on current page and filtered contents
        // function renderTable(page) {
        //     const tableBody = document.getElementById('table-body');
        //     tableBody.innerHTML = '';

        //     const start = (page - 1) * itemsPerPage;
        //     const end = start + itemsPerPage;
        //     const paginatedItems = filteredContents.slice(start, end);

        //     paginatedItems.forEach(content => {
        //         let imageUrl = "{{ asset('storage/') }}/" + content.image;
        //         const row = `<tr>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <div class="flex items-center space-x-4">
    //       <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
    //       <span>${content.title}</span>
    //     </div>
    //   </td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.category}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.sub_category.name}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.plays}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${new Date(content.created_at).toDateString()}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <a href="/edit/${content.id}"><img src="${editUrl}" alt=""></a>
    //   </td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <a href="/delete/${content.id}"><img src="${deleteUrl}" alt=""></a>
    //   </td>
    // </tr>`;
        //         tableBody.insertAdjacentHTML('beforeend', row);
        //     });

        //     renderResultsInfo(start + 1, Math.min(end, filteredContents.length), filteredContents.length);
        // }

        // // Function to handle page change
        // function changePage(page) {
        //     if (page < 1 || page > Math.ceil(filteredContents.length / itemsPerPage)) return;
        //     currentPage = page;
        //     renderTable(page);
        //     renderPagination(filteredContents.length);
        // }

        // // Function to render pagination controls
        // function renderPagination(totalItems) {
        //     const paginationControls = document.getElementById('pagination-controls');
        //     paginationControls.innerHTML = '';

        //     const totalPages = Math.ceil(totalItems / itemsPerPage);

        //     if (currentPage > 1) {
        //         const prevButton = `<a href="javascript:void(0);" onclick="changePage(currentPage - 1)"
    //           class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //           Previous
    //         </a>`;
        //         paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //     } else {
        //         const prevButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //           Previous
    //         </span>`;
        //         paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //     }

        //     if (currentPage < totalPages) {
        //         const nextButton = `<a href="javascript:void(0);" onclick="changePage(currentPage + 1)"
    //           class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //           Next
    //         </a>`;
        //         paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //     } else {
        //         const nextButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //           Next
    //         </span>`;
        //         paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //     }
        // }

        // // Function to render results info
        // function renderResultsInfo(start, end, total) {
        //     const resultsInfo = document.getElementById('results-info');
        //     resultsInfo.textContent = `Showing ${start} to ${end} of ${total} results`;
        // }

        // Assuming contents is initialized correctly in your PHP/Blade template

        // Click handler for sorting by plays (most listened)
        // $(document).on('click', "#mosted_listened", function() {
        //     const dropdown = document.querySelector('[role="content_listened_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let type = $(this).data('type');

        //     // Toggle sorting direction
        //     if (typeof this.sortOrder === 'undefined' || this.sortOrder === 'desc') {
        //         // Sort contents based on 'plays' property (descending)
        //         contents.sort((a, b) => b.plays - a.plays);
        //         this.sortOrder = 'asc';
        //         $("#mosted_listened").text('Low to High');
        //     } else {
        //         // Sort contents based on 'plays' property (ascending)
        //         contents.sort((a, b) => a.plays - b.plays);
        //         this.sortOrder = 'desc';
        //         $("#mosted_listened").text('High to Low');
        //     }

        //     currentPage = 1; // Reset to first page when sorting changes
        //     renderTable(currentPage);
        //     renderPagination(filteredContents.length);
        // });


        // let contents = @json($contents); // Make sure this variable gets populated correctly

        // let editUrl = "{{ asset('images/edit.svg') }}";
        // let deleteUrl = "{{ asset('images/trash.svg') }}";
        // const itemsPerPage = 10;
        // let currentPage = 1;
        // let filteredContents = []; // Variable to hold filtered contents

        // $(document).ready(function() {
        //     // Initial render on page load
        //     updateFilteredContents();
        //     renderTable(currentPage);
        //     renderPagination(filteredContents.length);
        // });

        // // Click handler for searching by category
        // $(document).on('click', "#searchCategory", function() {
        //     const dropdown = document.querySelector('[role="content_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let category = $(this).data('category');

        //     updateFilteredContentsByCategory(category);
        //     currentPage = 1; // Reset to first page when filter changes
        //     renderTable(currentPage);
        //     renderPagination(filteredContents.length);
        // });

        // // Click handler for searching by sub-category
        // $(document).on('click', "#searchSubCategory", function() {
        //     const dropdown = document.querySelector('[role="content_sub_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let subCategoryId = $(this).data('id');

        //     updateFilteredContentsBySubCategory(subCategoryId);
        //     currentPage = 1; // Reset to first page when filter changes
        //     renderTable(currentPage);
        //     renderPagination(filteredContents.length);
        // });



        // // Click handler for sorting by plays (most listened)
        // $(document).on('click', "#mosted_listened", function() {
        //     const dropdown = document.querySelector('[role="content_listened_menu"]');
        //     dropdown.classList.toggle('hidden');
        //     let type = $(this).data('type');

        //     // Toggle sorting direction
        //     if (typeof this.sortOrder === 'undefined' || this.sortOrder === 'desc') {
        //         // Sort contents based on 'plays' property (descending)
        //         filteredContents.sort((a, b) => b.plays - a.plays);
        //         this.sortOrder = 'asc';
        //         $("#mosted_listened").text('Low to High');
        //     } else {
        //         // Sort contents based on 'plays' property (ascending)
        //         filteredContents.sort((a, b) => a.plays - b.plays);
        //         this.sortOrder = 'desc';
        //         $("#mosted_listened").text('High to Low');
        //     }

        //     currentPage = 1; // Reset to first page when sorting changes
        //     renderTable(currentPage);
        //     renderPagination(filteredContents.length);
        // });

        // // Function to update filtered contents based on all filters
        // function updateFilteredContents() {
        //     filteredContents = [...contents]; // Reset filteredContents to include all contents initially
        // }

        // // Function to update filtered contents based on category filter
        // function updateFilteredContentsByCategory(category) {
        //     filteredContents = contents.filter(content => content.category == category);
        // }

        // // Function to update filtered contents based on sub-category filter
        // function updateFilteredContentsBySubCategory(subCategoryId) {
        //     filteredContents = contents.filter(content => content.sub_cat_id == subCategoryId);
        // }

        // // Function to render table rows based on current page and filtered contents
        // function renderTable(page) {
        //     const tableBody = document.getElementById('table-body');
        //     tableBody.innerHTML = '';

        //     const start = (page - 1) * itemsPerPage;
        //     const end = start + itemsPerPage;
        //     const paginatedItems = filteredContents.slice(start, end);

        //     paginatedItems.forEach(content => {
        //         let imageUrl = "{{ asset('storage/') }}/" + content.image;
        //         const row = `<tr>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <div class="flex items-center space-x-4">
    //       <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
    //       <span>${content.title}</span>
    //     </div>
    //   </td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.category}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.sub_category.name}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${content.plays}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">${new Date(content.created_at).toDateString()}</td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <a href="/edit/${content.id}"><img src="${editUrl}" alt=""></a>
    //   </td>
    //   <td class="border border-[#FFFFFF33] text-white px-6 py-4">
    //     <a href="/delete/${content.id}"><img src="${deleteUrl}" alt=""></a>
    //   </td>
    // </tr>`;
        //         tableBody.insertAdjacentHTML('beforeend', row);
        //     });

        //     renderResultsInfo(start + 1, Math.min(end, filteredContents.length), filteredContents.length);
        // }

        // // Function to handle page change
        // function changePage(page) {
        //     if (page < 1 || page > Math.ceil(filteredContents.length / itemsPerPage)) return;
        //     currentPage = page;
        //     renderTable(page);
        //     renderPagination(filteredContents.length);
        // }

        // // Function to render pagination controls
        // function renderPagination(totalItems) {
        //     const paginationControls = document.getElementById('pagination-controls');
        //     paginationControls.innerHTML = '';

        //     const totalPages = Math.ceil(totalItems / itemsPerPage);

        //     if (currentPage > 1) {
        //         const prevButton = `<a href="javascript:void(0);" onclick="changePage(currentPage - 1)"
    //           class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //           Previous
    //         </a>`;
        //         paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //     } else {
        //         const prevButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //           Previous
    //         </span>`;
        //         paginationControls.insertAdjacentHTML('beforeend', prevButton);
        //     }

        //     if (currentPage < totalPages) {
        //         const nextButton = `<a href="javascript:void(0);" onclick="changePage(currentPage + 1)"
    //           class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //           Next
    //         </a>`;
        //         paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //     } else {
        //         const nextButton = `<span class="px-4 py-2 rounded-lg border-2 text-white border-white justify-start items-center gap-2 inline-flex">
    //           Next
    //         </span>`;
        //         paginationControls.insertAdjacentHTML('beforeend', nextButton);
        //     }
        // }

        // // Function to render results info
        // function renderResultsInfo(start, end, total) {
        //     const resultsInfo = document.getElementById('results-info');
        //     resultsInfo.textContent = `Showing ${start} to ${end} of ${total} results`;
        // }

        let contents = @json($contents); // Make sure this variable gets populated correctly
        let editUrl = "{{ asset('images/edit.svg') }}";
        let deleteUrl = "{{ asset('images/trash.svg') }}";
        const itemsPerPage = 10;
        let currentPage = 1;
        let filteredContents = []; // Variable to hold filtered contents
        let currentCategoryFilter = null; // Variable to hold current category filter
        let currentSubCategoryFilter = null; // Variable to hold current sub-category filter

        $(document).ready(function() {
            updateFilteredContents();
            renderTable(currentPage);
            renderPagination(filteredContents.length);
        });

        // Click handler for searching by category
        $(document).on('click', "#searchCategory", function() {
            const dropdown = document.querySelector('[role="content_menu"]');
            dropdown.classList.toggle('hidden');
            let category = $(this).data('category');

            currentCategoryFilter = category;
            $("#content-category-button-text").text(category)
            currentSubCategoryFilter = null; // Reset sub-category filter when category changes
            updateFilteredContents();
            renderTable(currentPage);
            renderPagination(filteredContents.length);
        });

        // Click handler for searching by sub-category
        $(document).on('click', "#searchSubCategory", function() {
            const dropdown = document.querySelector('[role="content_sub_menu"]');
            dropdown.classList.toggle('hidden');
            let subCategoryId = $(this).data('id');
            let category_name = $(this).data('category-name');

            currentSubCategoryFilter = subCategoryId;
            $("#content-sub-category-button-text").text(category_name)
            updateFilteredContents();
            renderTable(currentPage);
            renderPagination(filteredContents.length);
        });

        // Click handler for sorting by plays (most listened)
        $(document).on('click', "#mosted_listened", function() {
            const dropdown = document.querySelector('[role="content_listened_menu"]');
            dropdown.classList.toggle('hidden');

            // Toggle sorting direction
            if (typeof this.sortOrder === 'undefined' || this.sortOrder === 'desc') {
                filteredContents.sort((a, b) => a.plays - b.plays); // Sort ascending
                this.sortOrder = 'asc';
                $("#mosted_listened").text('High to Low');
                $("#content-listened-button-text").text('High to Low')

            } else {
                filteredContents.sort((a, b) => b.plays - a.plays); // Sort descending
                this.sortOrder = 'desc';
                $("#mosted_listened").text('Low to High');
                $("#content-listened-button-text").text('Low to High')

            }

            currentPage = 1; // Reset to first page when sorting changes
            renderTable(currentPage);
            renderPagination(filteredContents.length);
        });

        // Function to update filtered contents based on all filters
        function updateFilteredContents() {
            if (currentCategoryFilter && currentSubCategoryFilter) {
                filteredContents = contents.filter(content => content.category == currentCategoryFilter && content
                    .sub_cat_id == currentSubCategoryFilter);
            } else if (currentCategoryFilter) {
                filteredContents = contents.filter(content => content.category == currentCategoryFilter);
            } else if (currentSubCategoryFilter) {
                filteredContents = contents.filter(content => content.sub_cat_id == currentSubCategoryFilter);
            } else {
                filteredContents = [...contents];
            }
        }

        // Function to render table rows based on current page and filtered contents
        function renderTable(page) {
            const tableBody = document.getElementById('table-body');
            tableBody.innerHTML = '';

            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedItems = filteredContents.slice(start, end);

            paginatedItems.forEach(content => {
                let imageUrl = "{{ asset('storage/') }}/" + content.image;
                let editButton="/admin/content/edit/"+content.id;
                let deleteButton="/admin/content/delete/"+content.id;
                const row = `<tr>
          <td class="border border-[#FFFFFF33] text-white px-6 py-4">
            <div class="flex items-center space-x-4">
              <img src="${imageUrl}" class="w-[100px] h-[100px] object-fill" alt="">
              <span>${content.title}</span>
            </div>
          </td>
          <td class="border-b border-l border-[#FFFFFF33] text-white px-6 py-4">${content.category}</td>
          <td class="border-b border-l border-[#FFFFFF33] text-white px-6 py-4">${content.sub_category ? content.sub_category.name : ''}</td>
          <td class="border-b border-l border-r border-[#FFFFFF33] text-white px-6 py-4">${content.plays}</td>
          <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">${new Date(content.created_at).toDateString()}</td>
          <td class="border-b  border-[#FFFFFF33] text-white px-6 py-4">
            <a href="${editButton}"><img src="${editUrl}" alt=""></a>
          </td>
          <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
            <a href="${deleteButton}"><img src="${deleteUrl}" alt=""></a>
          </td>
        </tr>`;
                tableBody.insertAdjacentHTML('beforeend', row);
            });

            renderResultsInfo(start + 1, Math.min(end, filteredContents.length), filteredContents.length);
        }

        // Function to handle page change
        function changePage(page) {
            if (page < 1 || page > Math.ceil(filteredContents.length / itemsPerPage)) return;
            currentPage = page;
            renderTable(page);
            renderPagination(filteredContents.length);
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
            resultsInfo.textContent = `Showing ${start} to ${end} of ${total} results`;
        }
    </script>
@endsection
