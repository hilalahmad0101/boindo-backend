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
    <form action="{{ route('admin.content.store') }}" method="POST" enctype="multipart/form-data" class="mt-[134px]">
        <div class="flex md:flex-row flex-col md:space-y-0 space-x-5 items-center justify-between">
            <h1 class="text-neutral-50 text-4xl font-black ">CONTENT UPLOAD</h1>
            <p>
            <div><span class="text-white text-xl font-normal ">Content will be added to search engine category - </span><span
                    class="text-amber-500 text-xl font-normal ">CONTENT</span> <input type='checkbox' name="search" /></div>
            </p>
        </div>
        <div>
            <div class="mt-12">
                <div>
                    @csrf
                    <div class="text-neutral-50 text-2xl font-black ">Media</div>
                    <div class="my-5">

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
                                <img src="" style="width: 100%" class="mt-4" id="previewImage" alt="">
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
                                <audio id="previewDemoAudio" controls style="display:none;" class="mt-5"></audio>
                                <div class="relative">
                                    <input type="file" id="onboardingDemoFileInput" name="demo" accept="audio/*"
                                        class="absolute inset-0 opacity-0 z-50 w-full" />
                                    <div class="mt-4" id="demo_audio_image">
                                        <img class="" src="{{ asset('images/file-upload.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex items-center justify-end relative">
                                    <input type="file" id="onboardingDemoFileInput" name="audio" accept="audio/*"
                                    class="absolute inset-0 opacity-0 z-50 w-full" />
                                    <img class="size-10 hidden" id="demo_edit"  src="{{ asset('images/edit.svg') }}" alt="">
                                </div>
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
                                <audio id="previewContentAudio" controls style="display:none;" class="mt-5"></audio>
                                <div class="relative">
                                    <input type="file" id="onboardingContentFileInput" name="audio" accept="audio/*"
                                        class="absolute inset-0 opacity-0 z-50 w-full ml-10" />
                                    <div class="mt-4" id="content_audio_image">
                                        <img class="" src="{{ asset('images/file-upload.svg') }}" alt="">
                                    </div>
                                </div>
                                <div class="flex items-center justify-end  relative">
                                    <input type="file" id="onboardingContentFileInput" name="audio" accept="audio/*"
                                    class="absolute inset-0 opacity-0 z-50 w-full ml-10" />
                                    <img class="size-10 hidden" id="content_edit"  src="{{ asset('images/edit.svg') }}"
                                        alt="">
                                </div>

                                @error('audio')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="my-5">
                        <h1 class="text-neutral-50 text-2xl font-black">Genral Information</h1>

                        <label class="">
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Title"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5  " />
                            @error('title')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 ">
                        <div class="my-5">
                            <label class="">
                                <input type="text" value="{{ old('isbn') }}" name="isbn" placeholder="ISBN"
                                    class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                                @error('isbn')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="my-5">
                            <select name="producers[]" id="producers" multiple
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl">
                                @php
                                    $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                @endphp
                                <option value="" disabled>Select Producer</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('producers')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="my-5">
                            <label class="">
                                <select name="authors[]" id="authors" multiple
                                    class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl ">
                                    @php
                                        $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                    @endphp
                                    <option value="" disabled>Select Author</option>

                                    @foreach ($authors as $author)
                                        <option value='{{ $author->id }}'>{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('authors')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="my-5">
                            <label class="">
                                <select name="translator[]" id="translator" multiple
                                    class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl ">
                                    @php
                                        $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                    @endphp
                                    <option value="" disabled>Select Traslator</option>
                                    @foreach ($authors as $author)
                                        <option value='{{ $author->id }}'>{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('translator')
                                    <span style="color: red">{{ $message }}</span>
                                @enderror
                            </label>
                        </div>
                        <div class="my-5">
                            <select name="director[]" id="director" multiple
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl ">
                                @php
                                    $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                @endphp
                                <option value="" disabled>Select Director</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('director')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="my-5">
                            <select name="music_director[]" id="music_director" multiple
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl ">
                                @php
                                    $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                @endphp
                                <option value="" disabled>Select Music Director</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('music_director')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="my-5">
                            <input type="text" value="{{ old('summary') }}" name="summary" placeholder="Summary"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                            @error('summary')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="my-5">
                            <input type="text" value="{{ old('total_duration') }}" name="total_duration"
                                placeholder="Total Duration"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                            @error('total_duration')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <h1 class="text-neutral-50 text-2xl font-black "> Artist</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">

                        <div class="my-5">
                            <select name="cost[]" id="cost" multiple
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl">
                                @php
                                    $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                @endphp
                                <option value="" disabled>Lead Cast</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('cost')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="my-5">
                            <select name="cost2[]" id="cost2" multiple
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl">
                                @php
                                    $authors = \App\Models\ActorProfile::orderBy('name', 'asc')->get();
                                @endphp
                                <option value="" disabled>Secondary Cast</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>
                                @endforeach
                            </select>
                            @error('cost2')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">
                        <label class="block mt-4 ">
                            <span class="text-neutral-50 text-2xl font-black">
                                Select Category
                            </span>
                            <select name="category" id="category" value="{{ old('category') }}"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                                <option value="">Select Category</option>
                                <option value="play">Play</option>
                                <option value="short stories">Short Stories</option>
                            </select>
                            @error('category')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </label>
                        <div></div>
                        <label class="block mt-4 text-sm">
                            <span class="text-neutral-50 text-2xl font-black">
                                Select Sub Category
                            </span>
                            <select name="subcategory[]" id="sub_category" value="{{ old('sub_category') }}"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                            </select>
                            @error('subcategory')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </label>
                        <div></div>
                        <div></div>
                        <div class="flex items-center justify-end space-x-9 mt-[76px] mb-10">
                            <button onclick="window.location.href='{{ route('admin.onboarding.index') }}'" type="button"
                                class="py-2 px-12 rounded-xl border border-white text-center text-slate-50 text-base font-black leading-7 tracking-wide">Cancel</button>
                            <button type="submit"
                                class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#addMoreBtn").click(function() {
                // Clone the existing input field and append it to the add_more div
                var clonedInput = `<div class="input-set"> 
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input type="text" name="playlist_title[]"  
                      class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                    @error('title')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label> 
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Authors Comma separated ( , )</span>
                    <input type="text" name="playlist_authors[]" value=""
                      class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                    @error('title')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label> 
                  <label class="block text-sm my-2">
                    <span class="text-gray-700 dark:text-gray-400">Audio</span>
                    <input type="file" name="playlist_audio[]"
                      class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                    @error('audio')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="hidden" name="duration[]" class="duration-input" readonly />
                  <button type="button" class="closeBtn flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <span>Close</span>
                  </button>
                </div>`;
                $("#add_more").append(clonedInput);
            });

            $(document).on('click', '.closeBtn', function() {
                $(this).closest(".input-set").remove();
            });

            $(document).on('change', 'input[name="playlist_audio[]"]', function() {
                var audioElement = new Audio();
                var durationInput = $(this).closest(".input-set").find('.duration-input');

                audioElement.src = URL.createObjectURL(this.files[0]);

                audioElement.addEventListener('loadedmetadata', function() {
                    var duration = audioElement.duration;
                    var minutes = Math.floor(duration / 60);
                    var seconds = Math.floor(duration % 60);
                    var formattedDuration =
                        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                    durationInput.val(formattedDuration);
                });
            });
        });
    </script>

    <script>
        document.getElementById('onboardingImageInput').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('previewImage');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    document.getElementById('image').classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('onboardingDemoFileInput').addEventListener('change', function(event) {
            const audioPreview = document.getElementById('previewDemoAudio');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    audioPreview.src = e.target.result;
                    audioPreview.style.display = 'block';
                    document.getElementById('grid_system').classList.add('md:grid-cols-3');
                    document.getElementById('grid_system').classList.remove('md:grid-cols-6');
                    document.getElementById('demo_audio_image').classList.add('hidden');
                    document.getElementById('demo_edit').classList.add('block');
                    document.getElementById('demo_edit').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('onboardingContentFileInput').addEventListener('change', function(event) {
            const audioPreview = document.getElementById('previewContentAudio');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    audioPreview.src = e.target.result;
                    audioPreview.style.display = 'block';
                    document.getElementById('content_audio_image').classList.add('hidden');
                    document.getElementById('content_edit').classList.add('block');
                    document.getElementById('content_edit').classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect('#producers', {
            persist: false,
            createOnBlur: true,
            create: true
        });

        new TomSelect('#authors', {
            persist: false,
            createOnBlur: true,
            create: true
        });

        new TomSelect('#translator', {
            persist: false,
            createOnBlur: true,
            create: true
        });

        new TomSelect('#director', {
            persist: false,
            createOnBlur: true,
            create: true
        });
        new TomSelect('#music_director', {
            persist: false,
            createOnBlur: true,
            create: true
        });
        new TomSelect('#cost', {
            persist: false,
            createOnBlur: true,
            create: true
        });
        new TomSelect('#cost2', {
            persist: false,
            createOnBlur: true,
            create: true
        });

        $("#category").on('change', function() {
            const value = $(this).val();
            console.log(value);
            $("#sub_category").attr({
                "multiple": false
            });
            $("#sub_category").html('');

            $.ajax({
                url: "{{ route('admin.content.get.subcategories') }}",
                type: 'POST',
                data: {
                    value,
                    _token: "{{ csrf_token() }}",
                },
                success: (data) => {
                    $("#sub_category").attr({
                        "multiple": true
                    });
                    $("#sub_category").html(data);

                    // Destroy existing TomSelect instance if it exists
                    if ($("#sub_category")[0].tomselect) {
                        $("#sub_category")[0].tomselect.destroy();
                    }

                    // Initialize a new TomSelect instance
                    // new TomSelect('#sub_category', {
                    //     persist: false,
                    //     createOnBlur: true,
                    //     create: true
                    // });
                }
            });
        });
    </script>
@endsection
