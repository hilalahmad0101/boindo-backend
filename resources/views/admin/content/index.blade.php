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
        <h1 class="text-neutral-50 text-4xl font-black ">CONTENT LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Content</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($contents) }}</span>
                    </p>
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
            </div>


            <div class="mt-8  overflow-x-scroll xl:overflow-hidden ">
                <table class="table-auto w-[1000px] xl:w-full rounded-md " id="dataTable">
                    <thead class="bg-[#FFFFFF33] rounded-tl-lg rounded-tr-lg">
                        <tr class="rounded-md">
                            <th
                                class="px-6 py-3 text-left  text-white border-b border-r border-t rounded-tl-md border-[#FFFFFF33]">
                                Name</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-r border-t border-[#FFFFFF33]">Category</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-r border-t border-[#FFFFFF33]">Sub Category</th>
                            <th class="px-6 py-3 text-left  text-white border-b  border-t border-[#FFFFFF33]">Listened</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Date</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Edit</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#383838]">
                        @foreach ($contents as $content)
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
                                    {{ $content->category }}</td>
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
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-[45px] mb-[50px]">
                {{ $contents->links() }}
            </div>

        </div>
    </div>
@endsection
