@extends('layouts.app')
@section('title')
    Create playlist
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/tagify.css') }}">

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create playlist
        </h2>
        <form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            action="{{ route('admin.content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <input type='checkbox' name="search" /> <label style="color:white">Is you want in searching</label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('title')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Author Separated by Comma(,)</span>
                      <select name="authors[]" id="" multiple  
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                       $authors=\App\Models\ActorProfile::orderBy('name','asc')->get();
                       @endphp
                       @foreach($authors as $author)
                       <option value='{{$author->id}}'>{{$author->name}}</option>
                       @endforeach
                    </select>
                  @error('authors')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">ISBN</span>
                    <input type="text" value="{{ old('isbn') }}" name="isbn"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('isbn')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Translator</span>
                     <select name="translator[]" id="" multiple  
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                       $authors=\App\Models\ActorProfile::orderBy('name','asc')->get();
                       @endphp
                       @foreach($authors as $author)
                       <option value='{{$author->id}}'>{{$author->name}}</option>
                       @endforeach
                    </select>
                   @error('translator')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>


            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Producer Separated by Comma(,)</span>
                 <select name="producers[]" id="" multiple  
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                       $authors=\App\Models\ActorProfile::orderBy('name','asc')->get();
                       @endphp
                       @foreach($authors as $author)
                       <option value='{{$author->id}}'>{{$author->name}}</option>
                       @endforeach
                    </select>
                @error('producers')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Adaption Separated by Comma(,)</span>
                <select name="adoption[]" id="" multiple  
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                       $authors=\App\Models\ActorProfile::orderBy('name','asc')->get();
                       @endphp
                       @foreach($authors as $author)
                       <option value='{{$author->id}}'>{{$author->name}}</option>
                       @endforeach
                    </select>
               @error('adoption')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>

            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Director Separated by Comma(,)</span>
                 <select name="director[]" id="" multiple 
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                       $authors=\App\Models\ActorProfile::orderBy('name','asc')->get();
                       @endphp
                       @foreach($authors as $author)
                       <option value='{{$author->id}}'>{{$author->name}}</option>
                       @endforeach
                    </select>
                 @error('director')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Music and special effects director Separated by
                    Comma(,)</span>
                     <select name="music_director[]" id="" multiple  
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                       $authors=\App\Models\ActorProfile::orderBy('name','asc')->get();
                       @endphp
                       @foreach($authors as $author)
                       <option value='{{$author->id}}'>{{$author->name}}</option>
                       @endforeach
                    </select>
               @error('music_director')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            
            <div>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Secondary Cost Separated by Comma(,)</span>
                     <select name="cost2[]" id="" multiple  
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                       $authors=\App\Models\ActorProfile::orderBy('name','asc')->get();
                       @endphp
                       @foreach($authors as $author)
                       <option value='{{$author->id}}'>{{$author->name}}</option>
                       @endforeach
                    </select>
                    @error('cost2')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Cast Separated by Comma(,)</span>
                     <select name="cost[]" id="" multiple  
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                       @php
                       $authors=\App\Models\ActorProfile::orderBy('name','asc')->get();
                       @endphp
                       @foreach($authors as $author)
                       <option value='{{$author->id}}'>{{$author->name}}</option>
                       @endforeach
                    </select>
                    @error('cost')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Enter the Summary</span>
                    <input type="text" value="{{ old('summary') }}" name="summary"
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
                    <select name="category" id="category" value="{{ old('category') }}"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="">Select Category</option>
                        <option value="play">Play</option>
                        <option value="short stories">Short Stories</option>
                    </select>
                    @error('category')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Select Sub Category
                    </span>
                    <select name="subcategory" id="sub_category" value="{{ old('sub_category') }}"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
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
                @error('image')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>

            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Total Duration</span>
                <input type="text" name="total_duration"
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
                </label>
            </div>
            <div id="add_more">

            </div>
            <button type="button" id="addMoreBtn"
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <span>Add More</span>
            </button>
            <div class="flex mt-6">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Create Playlist</span>
                </button>
            </div>
        </form>
    </div>


    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script>
            $(document).ready(function () {
              $("#addMoreBtn").click(function () {
                // Clone the existing input field and append it to the add_more div
                var clonedInput = `<div class="input-set"> 
                  <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Title</span>
                    <input type="text" name="playlist_title[]"  
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
                    <span>Close</span>
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
    </script>
@endsection
