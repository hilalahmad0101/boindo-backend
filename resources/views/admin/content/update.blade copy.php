@extends('layouts.new_app')
@section('title')
    Update Playlist
@endsection
@section('content')
    {{-- <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Update Playlist
        </h2> 
        <form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            action="{{ route('admin.content.update', [$content->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             
             <div>
                <input type='checkbox'  @checked($content->is_search == 1) name="search" /> <label style="color:white">Is you want in searching</label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input type="text" value="{{ $content->title }}" name="title"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('title')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    
                    <input type='hidden' name='id' id='id' value='{{$content->id}}' />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Author Separated by Comma(,)</span>
                    <select name="authors[]" id="new_multiple_data" multiple  
                        class="form-multiselect block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                        $authors = \App\Models\ActorProfile::orderBy('name','asc')->get();
                        $costIds = json_decode($content->authors, true) ?? [];
                        @endphp
                    
                        @foreach ($authors as $author)
                            @php
                            $isSelected = in_array($author->id, $costIds);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>{{ $author->name }}</option>
                        @endforeach
                    </select
                    @error('authors')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">ISBN</span>
                    <input type="text" name="isbn" value="{{ $content->isbn }}" 
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('isbn')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Translator</span>
                     <select name="translator[]" id="new_multiple_data" multiple  
                        class="form-multiselect block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                        $authors = \App\Models\ActorProfile::orderBy('name','asc')->get();
                        $costIds = json_decode($content->translator, true) ?? [];
                        @endphp
                    
                        @foreach ($authors as $author)
                            @php
                            $isSelected = in_array($author->id, $costIds);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>{{ $author->name }}</option>
                        @endforeach
                    </select>
                   @error('translator')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>


            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Producer Separated by Comma(,)</span>
                 <select name="producers[]" id="new_multiple_data" multiple  
                        class="form-multiselect block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @php
                        $authors = \App\Models\ActorProfile::orderBy('name','asc')->get();
                        $costIds = json_decode($content->producers, true) ?? [];
                        @endphp
                    
                        @foreach ($authors as $author)
                            @php
                            $isSelected = in_array($author->id, $costIds);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>{{ $author->name }}</option>
                        @endforeach
                    </select>
                @error('producers')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Adaption Separated by Comma(,)</span>
                <select name="adoption[]" id="new_multiple_data" multiple  
                        class="form-multiselect block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                         @php
                        $authors = \App\Models\ActorProfile::orderBy('name','asc')->get();
                        $costIds = json_decode($content->adoption, true) ?? [];
                        @endphp
                    
                        @foreach ($authors as $author)
                            @php
                            $isSelected = in_array($author->id, $costIds);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>{{ $author->name }}</option>
                        @endforeach
                    </select>
               @error('adoption')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>

            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Director Separated by Comma(,)</span>
                 <select name="director[]" id="new_multiple_data" multiple 
                        class="form-multiselect block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                         @php
                        $authors = \App\Models\ActorProfile::orderBy('name','asc')->get();
                        $costIds = json_decode($content->director, true) ?? [];
                        @endphp
                    
                        @foreach ($authors as $author)
                            @php
                            $isSelected = in_array($author->id, $costIds);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>{{ $author->name }}</option>
                        @endforeach
                    </select>
                 @error('director')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Music and special effects director Separated by
                    Comma(,)</span>
                     <select name="music_director[]" id="new_multiple_data" multiple  
                        class="form-multiselect block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @php
                        $authors = \App\Models\ActorProfile::orderBy('name','asc')->get();
                        $costIds = json_decode($content->music_director, true) ?? [];
                        @endphp
                    
                        @foreach ($authors as $author)
                            @php
                            $isSelected = in_array($author->id, $costIds);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>{{ $author->name }}</option>
                        @endforeach
                    </select>
               @error('music_director')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <div>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Secondary Cost Separated by Comma(,)</span>
                    <select name="cost2[]" id="new_multiple_data" multiple class="form-multiselect block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @php
                        $authors = \App\Models\ActorProfile::orderBy('name','asc')->get();
                        $costIds = json_decode($content->cost2, true) ?? [];
                        @endphp
                    
                        @foreach ($authors as $author)
                            @php
                            $isSelected = in_array($author->id, $costIds);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('cost')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Cast Separated by Comma(,)</span>
                    <select name="cost[]" id="new_multiple_data" multiple class="form-multiselect block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @php
                        $authors = \App\Models\ActorProfile::orderBy('name','asc')->get();
                        $costIds = json_decode($content->cost, true) ?? [];
                        @endphp
                    
                        @foreach ($authors as $author)
                            @php
                            $isSelected = in_array($author->id, $costIds);
                            @endphp
                            <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('cost')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Enter the Summary</span>
                    <input type="text" value="{{ $content->summary }}" name="summary"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('summary')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Select Category
                    </span>
                    <select name="category" id="category"
                        class=" block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="">Select Category</option>
                        <option @selected($content->category == "play") value="play">Play</option>
                        <option @selected($content->category == "short stories") value="short stories">Short Stories</option>
                    </select>
                    @error('category')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Select Sub Category
                    </span>
                    <select name="subcategory" id="sub_category"
                        class=" block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    </select>
                    @error('subcategory')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>


            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Image</span>
                <input type="file" name="image"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />

                <img src="{{ asset('storage') }}/{{ $content->image }}" style="width: 100px;" alt="">
                @error('image')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            
            
            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Total Duration</span>
                <input type="text" name="total_duration" value='{{$content->total_duration}}'
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                
            </label>


            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 my-2">
                 
                <label class="block text-sm my-2">
                    <span class="text-gray-700 dark:text-gray-400">Demo</span>
                    <input type="file" name="demo"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('demo')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    
                     <div style="margin-top:10px">
                        <audio controls>
                          <source src="{{asset('storage')}}/{{$content->demo}}" > 
                        </audio>
                   </div>
                </label>
            </div>
            
            @foreach ($content->playlists as $playlist)
            <div class="input-set"> 
            <input name='id[]' value="{{$playlist->id}}" type="hidden" />
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input type="text" name="playlist_title[]"  value="{{ $playlist->title }}"
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('title')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label> 
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Authors Comma separated ( , )</span>
                    <input type="text" name="playlist_authors[]" value="{{  $playlist->authors != '' ? implode(',', json_decode($playlist->authors)) : '' }}"
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('title')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label> 
                  <label class="block text-sm my-2">
                    <span class="text-gray-700 dark:text-gray-400">Audio</span>
                    <input type="file" name="playlist_audio[]"
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                   
                   <div style="margin-top:10px">
                        <audio controls>
                          <source src="{{asset('storage')}}/{{$playlist->audio}}" > 
                        </audio>
                   </div>
                    @error('audio')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="hidden" name="duration[]" class="duration-input" readonly />
                <div style='display: flex;align-items: center;justify-content: end;'>
                      <a href="/admin/content/delete/playlist/{{$playlist->id}}/content/{{$content->id}}" class="closeBtn flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <span>Delete</span>
                  </a>
                </div>
                </div>
            @endforeach
            
             <div id="add_more">

            </div>
            <button type="button" id="addMoreBtn"
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <span>Add More</span>
            </button>
            <div class="flex mt-6">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Upload Playlist</span>
                </button>
            </div>
        </form>
    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script>
    
    
    $(document).ready(function(){ 
              $("#addMoreBtn").click(function () {
                // Clone the existing input field and append it to the add_more div
                var clonedInput = `<div class="input-set"> 
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input type="text" name="playlist_title[]" value="{{ old('playlist_title') }}"
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('title')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label> 
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Authors Comma separated ( , )</span>
                    <input type="text" name="playlist_authors[]" value=""
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('title')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label> 
                  <label class="block text-sm my-2">
                    <span class="text-gray-700 dark:text-gray-400">Audio</span>
                    <input type="file" name="playlist_audio[]"
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('audio')
                      <span style="color: red">{{ $message }}</span>
                    @enderror
                  </label>
                  <input type="hidden" name="duration[]" class="duration-input" readonly />
                  <button type="button" class="closeBtn flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                    <span>Remove</span>
                  </button>
                </div>`;
                $("#add_more").append(clonedInput);
              });
        
              $(document).on('click', '.closeBtn', function () {
                $(this).closest(".input-set").remove();
              });
        
              $(document).on('change', 'input[name="playlist_audio[]"]', function () {
                var audioElement = new Audio();
                var durationInput = $(this).closest(".input-set").find('.duration-input');
        
                audioElement.src = URL.createObjectURL(this.files[0]);
        
                audioElement.addEventListener('loadedmetadata', function () {
                  var duration = audioElement.duration;
                  var minutes = Math.floor(duration / 60);
                  var seconds = Math.floor(duration % 60);
                  var formattedDuration = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                  durationInput.val(formattedDuration);
                });
              }); 
        const category_value=$("#category").val();
        const id=$("#id").val();
        
        $.ajax({
                url: "{{ route('admin.content.get.update.subcategories') }}",
                type: 'POST',
                data: {
                    value:category_value,
                    id,
                    _token: "{{ csrf_token() }}",
                },
                success: (data) => {
                    $("#sub_category").html(data);
                }
            });
    });
        
        $("#category").on('change', function() {
            const value = $(this).val();

            $.ajax({
                url: "{{ route('admin.content.get.subcategories') }}",
                type: 'POST',
                data: {
                    value,
                    _token: "{{ csrf_token() }}",
                },
                success: (data) => {
                    $("#sub_category").html(data);
                }
            });
        })
    </script> --}}
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
    <form action="{{ route('admin.content.update', ['id' => $content->id]) }}" method="POST" enctype="multipart/form-data"
        class="mt-[134px]">
        <div class="flex md:flex-row flex-col md:space-y-0 space-x-5 items-center justify-between">
            <h1 class="text-neutral-50 text-4xl font-black ">UPDATE CONTENT</h1>
            <p>
            <div><span class="text-white text-xl font-normal ">Content will be added to search engine category - </span><span
                    class="text-amber-500 text-xl font-normal ">CONTENT</span> <input @checked($content->is_search == 1)
                    type='checkbox' name="search" /></div>
            </p>
        </div>
        <div>
            <div class="mt-12">
                <div>
                    @csrf
                    <div class="my-5">
                        <div class="text-neutral-50 text-2xl font-black ">Media</div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div class="rounded-lg p-6 relative mt-[10px]">
                                <label for=""
                                    class="text-neutral-50 text-sm font-black flex justify-center space-x-2 items-center">
                                    <img src="{{ asset('images/img.png') }}" alt="">
                                    <span>Cover</span>
                                </label>
                                <input type="file" accept="images/*" id="onboardingImageInput" name="image"
                                    class="absolute inset-0 opacity-0 z-50" />
                                <div class=" mt-4" id="image">
                                    <img class="" src="{{ asset('storage/' . $content->image) }}" alt="">
                                </div>
                                <img src="" style="width: 100%" id="preivewImage" alt="">
                                @error('image')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="rounded-lg p-6  mt-[10px]">
                                <label for=""
                                    class="text-neutral-50 text-sm font-black flex mb-3 justify-center space-x-2 items-center">
                                    <img src="{{ asset('images/jingle.png') }}" alt="">
                                    <span>Demo</span>
                                </label>
                                <audio id="previewDemoAudio" controls style="display:none;" class="mt-5"></audio>
                                <div class="relative">
                                    {{-- <input type="file" id="onboardingFileInput" name="demo" accept="audio/*"
                                        class="absolute inset-0 opacity-0 z-50" /> --}}
                                    <div class=" mt-4" id="demo_image">
                                        <audio controls src="{{ asset('storage/' . $content->demo) }}"
                                            class="mt-5"></audio>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end  relative">
                                    <input type="file" id="onboardingDemoFileInput" name="demo" accept="audio/*"
                                        class="absolute inset-0 opacity-0 z-50 w-full ml-10" />
                                    <img class="size-10 " id="content_edit" src="{{ asset('images/edit.svg') }}"
                                        alt="">
                                </div>
                                @error('audio')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="rounded-lg p-6  mt-[10px]">

                                <label for=""
                                    class="text-neutral-50 text-sm font-black flex mb-3 justify-center space-x-2 items-center">
                                    <img src="{{ asset('images/content-song.png') }}" alt="">
                                    <span>Content</span>
                                </label>
                                <audio id="previewContentAudio" controls style="display:none;" class="mt-5"></audio>
                                <div class="relative">
                                    {{-- <input type="file" id="onboardingFileInput" name="audio" accept="audio/*"
                                        class="absolute inset-0 opacity-0 z-50" /> --}}
                                    <div class=" mt-4" id="audio_image">
                                        <audio controls src="{{ asset('storage/' . $content->audio) }}"
                                            class="mt-5"></audio>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end  relative">
                                    <input type="file" id="onboardingContentFileInput" name="audio" accept="audio/*"
                                        class="absolute inset-0 opacity-0 z-50 w-full ml-10" />
                                    <img class="size-10 " id="content_edit" src="{{ asset('images/edit.svg') }}"
                                        alt="">
                                </div>
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
                        <input type="text" name="title" value="{{ $content->title }}" placeholder="Title"
                            class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none mt-5 rounded-2xl " />
                        @error('title')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 ">
                    <div class="my-5">
                        <label class="">
                            <input type="text" value="{{ $content->isbn }}" name="isbn" placeholder="ISBN"
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
                                $costIds = json_decode($content->producers, true) ?? [];
                            @endphp
                            <option value="" disabled>Select Producer</option>

                            @foreach ($authors as $author)
                                @php
                                    $isSelected = in_array($author->id, $costIds);
                                @endphp
                                <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>
                                    {{ $author->name }}</option>
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
                                    $costIds = json_decode($content->authors, true) ?? [];
                                @endphp
                                <option value="" disabled>Select Author</option>

                                @foreach ($authors as $author)
                                    @php
                                        $isSelected = in_array($author->id, $costIds);
                                    @endphp
                                    <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>
                                        {{ $author->name }}</option>
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
                                    $costIds = json_decode($content->translator, true) ?? [];
                                @endphp
                                <option value="" disabled>Select Translator</option>

                                @foreach ($authors as $author)
                                    @php
                                        $isSelected = in_array($author->id, $costIds);
                                    @endphp
                                    <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>
                                        {{ $author->name }}</option>
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
                                $costIds = json_decode($content->director, true) ?? [];
                            @endphp
                            <option value="" disabled>Select Translator</option>

                            @foreach ($authors as $author)
                                @php
                                    $isSelected = in_array($author->id, $costIds);
                                @endphp
                                <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>
                                    {{ $author->name }}</option>
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
                                $costIds = json_decode($content->music_director, true) ?? [];
                            @endphp
                            <option value="" disabled>Select Translator</option>

                            @foreach ($authors as $author)
                                @php
                                    $isSelected = in_array($author->id, $costIds);
                                @endphp
                                <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>
                                    {{ $author->name }}</option>
                            @endforeach
                        </select>
                        @error('music_director')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-5">
                        <input type="text" value="{{ $content->summary }}" name="summary" placeholder="Summary"
                            class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl" />
                        @error('summary')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-5">
                        <input type="text" value="{{ $content->total_duration }}" name="total_duration"
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
                                $costIds = json_decode($content->cost, true) ?? [];
                            @endphp
                            <option value="" disabled>Select Translator</option>

                            @foreach ($authors as $author)
                                @php
                                    $isSelected = in_array($author->id, $costIds);
                                @endphp
                                <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>
                                    {{ $author->name }}</option>
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
                                $costIds = json_decode($content->cost2, true) ?? [];
                            @endphp
                            <option value="" disabled>Select Translator</option>

                            @foreach ($authors as $author)
                                @php
                                    $isSelected = in_array($author->id, $costIds);
                                @endphp
                                <option {{ $isSelected ? 'selected' : '' }} value='{{ $author->id }}'>
                                    {{ $author->name }}</option>
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
                        <select name="category" id="category" value="{{ $content->category }}"
                            class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                            <option value="">Select Category</option>
                            <option value="play" @selected($content->category == 'play')>Play</option>
                            <option value="short stories" @selected($content->category == 'short stories')>Short Stories</option>
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
                        <select name="subcategory[]" id="sub_category" value="{{ $content->sub_category }}"
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
            // $("#category").on('change', function() {
            const value = $("#category").val();
            $("#sub_category").attr({
                "multiple": false
            });
            $("#sub_category").html('');

            $.ajax({
                url: "{{ route('admin.content.get.update.subcategories') }}",
                type: 'POST',
                data: {
                    value,
                    id:"{{ $content->id }}",
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
                }
            });
            // });
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

        document.getElementById('onboardingImageInput').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('preivewImage');
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
                    document.getElementById('demo_image').classList.add('hidden');
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
                    document.getElementById('audio_image').classList.add('hidden');
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
    </script>
@endsection
