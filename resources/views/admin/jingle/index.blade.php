@extends('layouts.new_app')
@section('title')
    List Advertising
@endsection
@section('content')
    {{-- <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            style="display: flex;align-items: center;justify-content: space-between">
            List Advertising
            <a href="{{ route('admin.jingle.create') }}"
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
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Audio</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($jingles as $jingle)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ $jingle->title }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold"><img src="{{ asset('storage') }}/{{ $jingle->image }}"
                                                    style="width: 80px;" alt=""></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <audio controls>
                                              <source src="{{asset('storage')}}/{{$jingle->audio}}" > 
                                            </audio>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="{{ route('admin.jingle.edit', ['id'=>$jingle->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.jingle.delete', ['id'=>$jingle->id]) }}" 
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
        <h1 class="text-neutral-50 text-4xl font-black ">ADVERTISMENT LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Advertisment</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($jingles) }}</span>
                    </p>
                    <div class="flex items-center mt-3 md:mt-0">
                        <div class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                            <img src="{{ asset('images/search.png') }}" alt="">
                            <input type="text" placeholder="Search"
                                class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                        </div>
                        <a href="{{ route('admin.jingle.create') }}"
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
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Viewed</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Edit</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Sus</th>
                            <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="bg-[#383838]">
                        @foreach ($jingles as $jingle)
                            <tr>
                                <td class="border border-[#FFFFFF33] text-white  px-6 py-4 space-x-3">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ asset('storage/' . $jingle->image) }}"
                                            class="w-[100px] h-[100px] object-fill" alt="">
                                        <span> {{ $jingle->title }}</span>
                                    </div>
                                </td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ date('Y M d', strtotime($jingle->created_at)) }}</td>
                                <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    {{ $jingle->views }}</td>
                                <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    <a href="{{ route('admin.jingle.edit', ['id' => $jingle->id]) }}">
                                        <img src="{{ asset('images/edit.svg') }}" alt="">
                                    </a>
                                </td>
                                <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                                    @if ($jingle->status == 0)
                                        <a href="{{ route('admin.jingle.suspend', ['id' => $jingle->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="white" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 7.5V18M15 7.5V18M3 16.811V8.69c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811Z" />
                                            </svg>

                                        </a>
                                    @else
                                        <a href="{{ route('admin.jingle.suspend', ['id' => $jingle->id]) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="20"
                                                viewBox="0 0 14 20" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 0H4C5.10457 0 6 0.89543 6 2V18C6 19.1046 5.10457 20 4 20H2C0.89543 20 0 19.1046 0 18V2C0 0.89543 0.89543 0 2 0ZM10 0H12C13.1046 0 14 0.89543 14 2V18C14 19.1046 13.1046 20 12 20H10C8.89543 20 8 19.1046 8 18V2C8 0.89543 8.89543 0 10 0ZM2 2V18H4V2H2ZM10 2V18H12V2H10Z"
                                                    fill="white" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                                <td class="border-b border-[#FFFFFF33] px-6 py-4">
                                    <a href="{{ route('admin.jingle.delete', $jingle->id) }}">
                                        <img src="{{ asset('images/trash.svg') }}" alt="">
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-[45px] mb-[50px]">
                {{ $jingles->links() }}
            </div>

        </div>
    </div>
@endsection
