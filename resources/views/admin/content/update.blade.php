@extends('layouts.new_app')
@section('title')
    Create Content
@endsection
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">  --}}
    <style>
        .ts-control {
            background-color: transparent !important;
            border: none !important;
            color: #000 !important;
            padding: 0px !important
        }

        .item {
            background-color: transparent !important;
            border: none !important;
            color: white !important;
        }
    </style>
    <form action="" method="POST" enctype="multipart/form-data" class="mt-[134px]">
        <div class="flex md:flex-row flex-col md:space-y-0 space-x-5 items-center justify-between">
            <h1 class="text-neutral-50 text-4xl font-black ">CONTENT UPDATE</h1>
            <p>
            <div><span class="text-white text-xl font-normal ">Content will be added to search engine category - </span><span
                    class="text-amber-500 text-xl font-normal ">CONTENT</span> <input type='checkbox' name="search"
                    id="is_search" @checked($content->is_search == 1) /></div>
            </p>
        </div>
        <div>
            <div class="mt-12">
                <div>
                    @csrf
                    <div class="text-neutral-50 text-2xl font-black ">Media</div>
                    <div class="mt-5">

                        <div class="grid grid-cols-1 md:grid-cols-6 gap-5" id="grid_system">
                            <div class="rounded-lg p-6 relative mt-[10px]">
                                <label for=""
                                    class="text-neutral-50 text-sm font-black flex justify-center space-x-2 items-center">
                                    <img src="{{ asset('images/img.png') }}" alt="">
                                    <span>Cover</span>
                                </label>
                                <input type="file" accept="images/*" id="onboardingImageInput" name="image"
                                    class="absolute inset-0 opacity-0 z-50" />
                                <div class="mt-4" id="image">
                                    <img class="" id="" src="{{ asset('images/file-upload.svg') }}"
                                        alt="">
                                </div>
                                {{-- <div id="progressWrapper" class="w-full bg-gray-200 rounded-full h-4 mt-4">
                                    <div id="progressBar"
                                        class="bg-blue-600 h-4 rounded-full text-center text-white text-sm leading-4"
                                        style="width: 0%">0%</div>
                                </div> --}}

                                <div class="w-full max-w-md pt-4 flex items-center space-x-2">
                                    <div class="flex items-center space-x-2 w-full">
                                        <div id="progressWrapper" class="relative w-full h-1 bg-gray-600 rounded-full">
                                            <div id="progressBar" class="absolute h-1 bg-white rounded-full"
                                                style="width: {{ $content->image ?'100':'0' }}%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-white text-sm" id="progressTextImage">{{ $content->image ?'100':'0' }}%</div>

                                {{-- <img src="" style="width: 100%" class="mt-4" id="previewImage" alt=""> --}}
                                @error('image')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="rounded-lg p-6 mt-[10px]">
                                <label for=""
                                    class="text-neutral-50 text-sm font-black flex mb-3 justify-center space-x-2 items-center">
                                    <img src="{{ asset('images/jingle.png') }}" alt="">
                                    <span>Demo</span>
                                </label>
                                {{-- <audio id="previewDemoAudio" controls style="display:none;" class="mt-5"></audio> --}}
                                <div class="relative">
                                    <input type="file" id="onboardingDemoFileInput" name="demo" accept="audio/*"
                                        class="absolute inset-0 opacity-0 z-50 w-full" />
                                    <div class="mt-4" id="demo_audio_image">
                                        <img class="" src="{{ asset('images/file-upload.svg') }}" alt="">
                                    </div>
                                </div>

                                {{-- <div id="progressWrapperDemo" class="w-full bg-gray-200 rounded-full h-4 mt-4">
                                    <div id="progressBarDemo"
                                        class="bg-blue-600 h-4 rounded-full text-center text-white text-sm leading-4"
                                        style="width: 0%">0%</div>
                                </div> --}}
                                <div class="w-full max-w-md pt-4 flex items-center space-x-2">
                                    <div class="flex items-center space-x-2 w-full">
                                        <div id="progressWrapperDemo" class="relative w-full h-1 bg-gray-600 rounded-full">
                                            <div id="progressBar" class="absolute h-1 bg-white rounded-full"
                                                style="width: {{ $content->demo ? '100' : '0' }}%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-white text-sm" id="progressTextDemo">{{ $content->demo ? '100' : '0' }}%</div>
                                @error('audio')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="rounded-lg p-6 mt-[10px]">
                                <label for=""
                                    class="text-neutral-50 text-sm font-black flex mb-3 justify-center space-x-2 items-center">
                                    <img src="{{ asset('images/content-song.png') }}" alt="">
                                    <span>Content</span>
                                </label>
                                <div class="relative">
                                    <input type="file" id="onboardingAudioFileInput" name="audio" accept="audio/*"
                                        class="absolute inset-0 opacity-0 z-50 w-full ml-10" />
                                    <div class="mt-4" id="content_audio_image">
                                        <img class="" src="{{ asset('images/file-upload.svg') }}" alt="">
                                    </div>
                                </div>
                                {{-- <div id="progressWrapperAudio" class="w-full bg-gray-200 rounded-full h-4 mt-4">
                                    <div id="progressBarDemo"
                                        class="bg-blue-600 h-4 rounded-full text-center text-white text-sm leading-4"
                                        style="width: 0%">0%</div>
                                </div> --}}

                                <div class="w-full max-w-md pt-4 flex items-center space-x-2">
                                    <div class="flex items-center space-x-2 w-full">
                                        <div id="progressWrapperAudio" class="relative w-full h-1 bg-gray-600 rounded-full">
                                            <div id="progressBar" class="absolute h-1 bg-white rounded-full"
                                                style="width: {{ $content->audio ? '100' : '0' }}%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-white text-sm" id="progressTextAudio">{{ $content->audio ? '100' : '0' }}%</div>

                                @error('audio')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="mt-5">
                        <h1 class="text-neutral-50 text-2xl font-black ml-2">Genral Information</h1>

                        <label class="">
                            <input type="text" id="title" value="{{ $content->title }}" placeholder="Title"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5  " />
                            @error('title')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 ">
                        <div class="mt-5">
                            <label class="">
                                <input type="text" value="{{ $content->isbn }}" id="isbn" placeholder="ISBN"
                                    class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                                @error('isbn')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="mt-5">
                            <div class="w-full mx-auto text-white">
                                <div class="relative multi-select-container" data-type="producers">
                                    <div id="selectedItems"
                                        class="w-full flex selected-items items-center justify-between bg-[#383838] py-4 px-4 rounded-2xl cursor-pointer">
                                        <span>Producers</span>
                                        <img src="{{ asset('icons/down.png') }}" class="size-6" alt="">
                                    </div>
                                    <div id="dropdown"
                                        class="dropdown absolute w-full h-60 overflow-y-scroll hidden bg-[#383838] mt-1 rounded-2xl z-10">
                                        <ul class="list-none p-0 m-0">
                                            @php
                                                $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                                $costIds = json_decode($content->producers, true) ?? [];
                                            @endphp
                                            @foreach ($authors as $author)
                                                @php
                                                    $isSelected = in_array($author->id, $costIds);
                                                @endphp
                                                <li class="flex items-center justify-between py-2 px-4 cursor-pointer hover:bg-gray-600"
                                                    data-value="{{ $author->id }}">
                                                    <span>{{ $author->name }}</span>
                                                    <input {{ $isSelected ? 'checked' : '' }} type="checkbox"
                                                        class="ml-2">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @error('producers')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <div class="w-full mx-auto text-white">
                                <div class="relative multi-select-container" data-type="authors">
                                    <div id="selectedItems"
                                        class="w-full flex selected-items items-center justify-between bg-[#383838] py-4 px-4 rounded-2xl cursor-pointer">
                                        <span>Authors</span>
                                        <img src="{{ asset('icons/down.png') }}" class="size-6" alt="">
                                    </div>
                                    <div id="dropdown"
                                        class="dropdown absolute w-full h-60 overflow-y-scroll hidden bg-[#383838] mt-1 rounded-2xl z-10">
                                        <ul class="list-none p-0 m-0">
                                            @php
                                                $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                                $costIds = json_decode($content->authors, true) ?? [];
                                            @endphp
                                            @foreach ($authors as $author)
                                                @php
                                                    $isSelected = in_array($author->id, $costIds);
                                                @endphp
                                                <li class="flex items-center justify-between py-2 px-4 cursor-pointer hover:bg-gray-600"
                                                    data-value="{{ $author->id }}">
                                                    <span>{{ $author->name }}</span>
                                                    <input {{ $isSelected ? 'checked' : '' }} type="checkbox"
                                                        class="ml-2">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @error('authors')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <div class="w-full mx-auto text-white">
                                <div class="relative multi-select-container" data-type="translators">
                                    <div id="selectedItems"
                                        class="w-full flex selected-items items-center justify-between bg-[#383838] py-4 px-4 rounded-2xl cursor-pointer">
                                        <span>Translators</span>
                                        <img src="{{ asset('icons/down.png') }}" class="size-6" alt="">
                                    </div>
                                    <div id="dropdown"
                                        class="dropdown absolute w-full h-60 overflow-y-scroll hidden bg-[#383838] mt-1 rounded-2xl z-10">
                                        <ul class="list-none p-0 m-0">
                                            @php
                                                $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                                $costIds = json_decode($content->translator, true) ?? [];
                                            @endphp
                                            @foreach ($authors as $author)
                                                @php
                                                    $isSelected = in_array($author->id, $costIds);
                                                @endphp
                                                <li class="flex items-center justify-between py-2 px-4 cursor-pointer hover:bg-gray-600"
                                                    data-value="{{ $author->id }}">
                                                    <span>{{ $author->name }}</span>
                                                    <input {{ $isSelected ? 'checked' : '' }} type="checkbox"
                                                        class="ml-2">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @error('autheors')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <div class="w-full mx-auto text-white">
                                <div class="relative multi-select-container" data-type="directors">
                                    <div id="selectedItems"
                                        class="w-full flex selected-items items-center justify-between bg-[#383838] py-4 px-4 rounded-2xl cursor-pointer">
                                        <span>Directors</span>
                                        <img src="{{ asset('icons/down.png') }}" class="size-6" alt="">
                                    </div>
                                    <div id="dropdown"
                                        class="dropdown absolute w-full h-60 overflow-y-scroll hidden bg-[#383838] mt-1 rounded-2xl z-10">
                                        <ul class="list-none p-0 m-0">
                                            @php
                                                $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                                $costIds = json_decode($content->director, true) ?? [];
                                            @endphp
                                            @foreach ($authors as $author)
                                                @php
                                                    $isSelected = in_array($author->id, $costIds);
                                                @endphp
                                                <li class="flex items-center justify-between py-2 px-4 cursor-pointer hover:bg-gray-600"
                                                    data-value="{{ $author->id }}">
                                                    <span>{{ $author->name }}</span>
                                                    <input {{ $isSelected ? 'checked' : '' }} type="checkbox"
                                                        class="ml-2">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @error('autheors')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <div class="w-full mx-auto text-white">
                                <div class="relative multi-select-container" data-type="music_directors">
                                    <div id="selectedItems"
                                        class="w-full flex selected-items items-center justify-between bg-[#383838] py-4 px-4 rounded-2xl cursor-pointer">
                                        <span>Music Director</span>
                                        <img src="{{ asset('icons/down.png') }}" class="size-6" alt="">
                                    </div>
                                    <div id="dropdown"
                                        class="dropdown absolute w-full h-60 overflow-y-scroll hidden bg-[#383838] mt-1 rounded-2xl z-10">
                                        <ul class="list-none p-0 m-0">
                                            @php
                                                $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                                $costIds = json_decode($content->music_director, true) ?? [];
                                            @endphp
                                            @foreach ($authors as $author)
                                                @php
                                                    $isSelected = in_array($author->id, $costIds);
                                                @endphp
                                                <li class="flex items-center justify-between py-2 px-4 cursor-pointer hover:bg-gray-600"
                                                    data-value="{{ $author->id }}">
                                                    <span>{{ $author->name }}</span>
                                                    <input {{ $isSelected ? 'checked' : '' }} type="checkbox"
                                                        class="ml-2">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @error('autheors')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <input type="text" value="{{ $content->summary }}" id="summary" placeholder="Summary"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                            @error('summary')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <input type="text" value="{{ $content->total_duration }}" id="total_duration"
                                placeholder="Total Duration"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                            @error('total_duration')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <h1 class="text-neutral-50 text-2xl font-black mt-[71px] ml-2"> Artist</h1>

                    <div class="grid grid-cols-1 md:grid-cols-1 gap-6 ">

                        <div class="mt-5">
                            <div class="w-full mx-auto text-white">
                                <div class="relative multi-select-container" data-type="cast">
                                    <div id="selectedItems"
                                        class="w-full flex selected-items items-center justify-between bg-[#383838] py-4 px-4 rounded-2xl cursor-pointer">
                                        <span>Lead Cast</span>
                                        <img src="{{ asset('icons/down.png') }}" class="size-6" alt="">
                                    </div>
                                    <div id="dropdown"
                                        class="dropdown absolute w-full h-60 overflow-y-scroll hidden bg-[#383838] mt-1 rounded-2xl z-10">
                                        <ul class="list-none p-0 m-0">
                                            @php
                                                $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                                $costIds = json_decode($content->cost, true) ?? [];
                                            @endphp
                                            @foreach ($authors as $author)
                                                @php
                                                    $isSelected = in_array($author->id, $costIds);
                                                @endphp
                                                <li class="flex items-center justify-between py-2 px-4 cursor-pointer hover:bg-gray-600"
                                                    data-value="{{ $author->id }}">
                                                    <span>{{ $author->name }}</span>
                                                    <input {{ $isSelected ? 'checked' : '' }} type="checkbox"
                                                        class="ml-2">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @error('cast')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="">
                            <div class="w-full mx-auto text-white">
                                <div class="relative multi-select-container" data-type="cast2">
                                    <div id="selectedItems"
                                        class="w-full flex selected-items items-center justify-between bg-[#383838] py-4 px-4 rounded-2xl cursor-pointer">
                                        <span>Secondary Cast</span>
                                        <img src="{{ asset('icons/down.png') }}" class="size-6" alt="">
                                    </div>
                                    <div id="dropdown"
                                        class="dropdown absolute w-full h-60 overflow-y-scroll hidden bg-[#383838] mt-1 rounded-2xl z-10">
                                        <ul class="list-none p-0 m-0">
                                            @php
                                                $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                                $costIds = json_decode($content->cost2, true) ?? [];
                                            @endphp
                                            @foreach ($authors as $author)
                                                @php
                                                    $isSelected = in_array($author->id, $costIds);
                                                @endphp
                                                <li class="flex items-center justify-between py-2 px-4 cursor-pointer hover:bg-gray-600"
                                                    data-value="{{ $author->id }}">
                                                    <span>{{ $author->name }}</span>
                                                    <input {{ $isSelected ? 'checked' : '' }} type="checkbox"
                                                        class="ml-2">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @error('cast')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-[71px]">
                        <label class="block mt-4 relative">
                            <span class="text-neutral-50 text-2xl font-black">
                                Category
                            </span>
                            <img src="{{ asset('icons/down.png') }}" class="absolute top-[4.2rem] right-[11px] size-6"
                                alt="">
                            <select name="category" id="category"
                                class="w-full bg-[#383838]  appearance-none py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                                <option value="">Select Category</option>
                                <option value="play" @selected($content->category == 'play')>Play</option>
                                <option @selected($content->category == 'short stories') value="short stories">Short Stories</option>
                            </select>
                            @error('category')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </label>
                        <div></div>
                        <label class="block mt-8 text-sm">
                            <span class="text-neutral-50 text-2xl font-black">
                                Sub Category
                            </span>
                            {{-- <select name="subcategory[]" id="sub_category" value="{{ $content->sub_category }}"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                            </select>
                            @error('subcategory')
                                <span style="color: red">{{ $message }}</span>
                            @enderror --}}
                            <div id="sub-category-container">
                                <!-- Initial Sub-category Field -->
                                <div class="flex items-baseline mb-4 sub-category-item appearance-none space-x-4">
                                    <select id="sub_category1"
                                        class="w-full bg-[#383838]  appearance-none py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                                    </select>
                                    <img id="add-more-btn" src="{{ asset('icons/add-more.png') }}" class="size-6 "
                                        alt="">
                                </div>
                            </div>
                        </label>
                        <div></div>
                        <div></div>
                        <div class="flex items-center justify-end space-x-9 mt-[76px] mb-10">
                            <button onclick="window.location.href='{{ route('admin.onboarding.index') }}'" type="button"
                                class="py-2 px-12 rounded-xl border border-white text-center text-slate-50 text-base font-black leading-7 tracking-wide">Cancel</button>
                            <button type="button" id="saveData" data-url="{{ route('admin.content.store') }}"
                                class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <div class="fixed top-0 right-0 left-0 hidden" id="on_success">
        <div class="flex items-center justify-center h-screen w-full bg-gray-900/60">
            <div class="bg-gray-800 text-center container mx-auto py-20 p-8  rounded-md max-w-2xl shadow-lg">
                <div class="flex justify-center items-center mb-4">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                </div>
                <h2 class="text-white text-2xl mb-4">Content Update successfully</h2>
                <button onclick="window.location.href='/admin/content/list'"
                    class="bg-white text-gray-800 px-4 py-2 rounded-full hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-600">
                    Close this popup
                </button>
            </div>
        </div>
    </div>

    <script>
        const value = $("#category").val();
        $("#sub_category").html('');

        $.ajax({
            url: "{{ route('admin.content.get.update.subcategories') }}",
            type: 'POST',
            data: {
                value,
                id: "{{ $content->id }}",
                _token: "{{ csrf_token() }}",
            },
            success: (data) => {
                $("#sub_category1").html(data);
            }
        });
        let isImageComplete = false;
        let isDemoComplete = false;
        let isAudioComplete = false;
        let uploadInProgress = false;
        let contentId = 0;

        let audio = "";
        let video = "";
        let image = "";

        let assetsUpload = false;


        document.getElementById('onboardingImageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                simulateUpload(file, 'progressBar', 'progressTextImage');
                image = file;
                isImageComplete = true;

            }
        });

        document.getElementById('onboardingDemoFileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                simulateUpload(file, 'progressWrapperDemo', 'progressTextDemo');
                demo = file;
                isDemoComplete = true;

            }
        });

        document.getElementById('onboardingAudioFileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                simulateUpload(file, 'progressWrapperAudio', 'progressTextAudio');
                audio = file;
                isAudioComplete = true;


            }
        });


        function simulateUpload(file, progressbar, progressText) {
            const progressBar = document.getElementById(progressbar);
            const totalSize = file.size;
            let uploadedSize = 0;

            const uploadInterval = setInterval(() => {
                // Simulate a chunk of upload
                const chunkSize = Math.random() * (totalSize / 10);
                uploadedSize += chunkSize;

                // Calculate the percentage completed
                const percentComplete = Math.min((uploadedSize / totalSize) * 100, 100);
                progressBar.style.backgroundColor = 'white';
                progressBar.style.width = percentComplete + '%';
                $("#" + progressText).text(Math.round(percentComplete) + '%');

                // If upload is complete, stop the interval
                if (uploadedSize >= totalSize) {
                    clearInterval(uploadInterval);
                    // alert("upload complete")
                    upload();
                }
            }, 100); // Adjust the interval timing as needed
        }




        function upload() {
            let formData = new FormData();
            formData.append('_token', "{{ csrf_token() }}");
            if (isImageComplete) {
                formData.append('image', image);
            }
            if (isAudioComplete) {
                formData.append('audio', audio);
            }
            if (isDemoComplete) {
                formData.append('demo', demo);
            }
            formData.append('id', "{{ $content->id }}");
            $.ajax({
                url: "{{ route('admin.content.assets.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.success) {
                        assetsUpload = true;
                        contentId = data.id,
                            toastr['success'](data.message)
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }






        // window.addEventListener('beforeunload', function(e) {
        //     if (!assetsUpload) {
        //         const confirmationMessage = 'Upload is in progress. Are you sure you want to leave?';
        //         e.returnValue = confirmationMessage; // Standard way to show the dialog in most browsers
        //         return confirmationMessage; // Some browsers require this line
        //     }
        // });





        let arraysProducers = [];
        let arrayAuthers = [];
        let arrayTranslators = [];
        let arrayDirectors = [];
        let arrayMusicDirectors = [];
        let arrayCast = [];
        let arrayCast2 = [];
        let openDropdown = null; // Track the currently open dropdown



        $('.multi-select-container').each(function() {
            const $container = $(this);
            const type = $container.data('type');
            const $selectedItems = $container.find('.selected-items');
            const $dropdown = $container.find('.dropdown');
            const $dropdownItems = $dropdown.find('li');
            let selectedValues = [];

            // Initialize selected values
            $dropdownItems.each(function() {
                const $checkbox = $(this).find('input[type="checkbox"]');
                const value = $(this).data('value');
                const text = $(this).find('span').text();

                if ($checkbox.prop('checked')) {
                    selectedValues.push({
                        value: value,
                        text: text
                    });
                }
            });

            // Update the display with the default selected items
            updateSelectedItemsDisplay();

            // Toggle dropdown display
            $selectedItems.on('click', function() {
                if (openDropdown && openDropdown !== $dropdown) {
                    openDropdown.hide();
                }
                $dropdown.toggle();
                openDropdown = $dropdown.is(':visible') ? $dropdown : null;
            });

            // Handle selection of dropdown items
            $dropdownItems.on('click', function(event) {
                const $checkbox = $(this).find('input[type="checkbox"]');
                const value = $(this).data('value');
                const text = $(this).find('span').text();

                // Toggle the checkbox state
                $checkbox.prop('checked', !$checkbox.prop('checked'));

                if ($checkbox.prop('checked')) {
                    if (!selectedValues.some(item => item.value === value)) {
                        selectedValues.push({
                            value: value,
                            text: text
                        });
                    }
                } else {
                    selectedValues = selectedValues.filter(item => item.value !== value);
                }

                updateSelectedItemsDisplay();
            });

            function updateSelectedItemsDisplay() {
                if (selectedValues.length > 2) {
                    const displayText = selectedValues.slice(0, 2).map(item => item.text).join(', ');
                    $selectedItems.find('span').text(`${displayText} +${selectedValues.length - 2}`);
                } else {
                    const displayText = selectedValues.map(item => item.text).join(', ');
                    $selectedItems.find('span').text(displayText);
                }
            }

            // Store selected values in separate arrays based on type
            switch (type) {
                case 'producers':
                    arraysProducers = selectedValues;
                    break;
                case 'authors':
                    arrayAuthers = selectedValues;
                    break;
                case 'translators':
                    arrayTranslators = selectedValues;
                    break;
                case 'directors':
                    arrayDirectors = selectedValues;
                    break;
                case 'music_directors':
                    arrayMusicDirectors = selectedValues;
                    break;
                case 'cast':
                    arrayCast = selectedValues;
                    break;
                case 'cast2':
                    arrayCast2 = selectedValues;
                    break;
                default:
                    break;
            }
        });

        // Hide dropdowns when clicking outside
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.multi-select-container').length) {
                if (openDropdown) {
                    openDropdown.hide();
                    openDropdown = null;
                }
            }
        });



        


        let subCategoryCount = 1;
        let deleteUrl = "{{ asset('images/trash.svg') }}";

        function addSubCategoryField() {
            const newField = `
    <div class="flex items-center mb-4 sub-category-item space-x-5">
        <select id="sub_category${subCategoryCount}" name="sub_category[]" class="w-full bg-[#383838] appearance-none py-4 px-4 text-white outline-none border-none rounded-2xl mt-2">
        </select>
        <img src="${deleteUrl}" class="size-6 delete-btn" />
    </div>
    `;
            $('#sub-category-container').append(newField);
        }

        $('#sub-category-container').on('click', '.delete-btn', function() {
            subCategoryCount--;
            // Mark the item for deletion
            $(this).closest('.sub-category-item').find('select').attr('name', 'deleted_sub_category[]');
            $(this).closest('.sub-category-item').hide(); // Optionally hide it
        });

        $('#add-more-btn').click(function() {
            subCategoryCount++;
            const value = $("#category").val();
            addSubCategoryField();

            $.ajax({
                url: "{{ route('admin.content.get.subcategories') }}",
                type: 'POST',
                data: {
                    value,
                    _token: "{{ csrf_token() }}",
                },
                success: (data) => {
                    $("#sub_category" + subCategoryCount).html(data);
                }
            });
        });
        $("#category").on('change', function() {
            const value = $(this).val();

            $("#sub_category1").html('');
            $.ajax({
                url: "{{ route('admin.content.get.subcategories') }}",
                type: 'POST',
                data: {
                    value,
                    _token: "{{ csrf_token() }}",
                },
                success: (data) => {
                    console.log(data);
                    $("#sub_category" + subCategoryCount).html(data);
                    $("#add-more-btn").addClass('block').removeClass('hidden');

                }
            });
        });

        $('#saveData').on('click', function(e) {
            e.preventDefault();
            let url = $(this).data('url');
            let multipiCategory = [];
            console.log(subCategoryCount);
            for (let i = 1; i <= subCategoryCount; i++) {
                multipiCategory.push($("#sub_category" + i).val())
            }
            $("#saveData").text('Updating....')
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": "{{ $content->id }}",
                    'category': $("#category").val(),
                    'sub_cat_id': multipiCategory,
                    'title': $("#title").val(),
                    'isbn': $("#isbn").val(),
                    'translator': arrayTranslators.map(item => item.value),
                    'total_duration': $("#total_duration").val(),
                    'cost': arrayCast.map(item => item.value),
                    'summary': $("#summary").val(),
                    'search': $("#is_search").is(":checked") == true ? 1 : 0,
                    'author_id': arrayAuthers.map(item => item.value),
                    'authors': arrayAuthers.map(item => item.value),
                    'cost2': arrayCast2.map(item => item.value),
                    'producers': arraysProducers.map(item => item.value),
                    'director': arrayDirectors.map(item => item.value),
                    'music_director': arrayMusicDirectors.map(item => item.value),
                },
                success: (data) => {
                    if (data.success) {
                        $("#on_success").addClass('block').removeClass('hidden');
                        $("#saveData").text('Upload')
                    }
                }
            })

        })
    </script>
@endsection
