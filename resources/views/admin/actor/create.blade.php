@extends('layouts.new_app')
@section('title')
    Create Actor
@endsection
@section('content')
    {{-- <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create Actor
        </h2>
        <form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            action="{{ route('admin.actor.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div>
                <input type='checkbox' name="search" /> <label style="color:white">Is you want in searching</label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input type="text" name="name"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('name')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Profession Separated by Comma(,)</span>
                    <input type="text" name="profession" placeholder="profession1,profession2" autofocus
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('profession')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6 my-2">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Biograpy</span>
                    <input type="text" name="biograpy"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    @error('biograpy')
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
            <div class="flex mt-6">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Create Actor</span>
                </button>
            </div>
        </form>
    </div> --}}

    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">CREATE Actor</h1>
        <div>
            <div class="mt-12">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.actor.store') }}">
                    @csrf

                    <div>
                        <input type='checkbox' name="search" /> <label style="color:white">Is you want in searching</label>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="rounded-lg pb-6 relative mt-[10px]">
                            <label for="" class="text-neutral-50 text-2xl font-black m">Media</label>
                            <input type="file" accept="images/*" id="onboardingImageInput" name="image"
                                class="absolute inset-0 opacity-0 z-50" />
                            <div class=" mt-4" id="image">
                                <img class="" src="{{ asset('images/file-upload.svg') }}" alt="">
                            </div>
                            <img src="" style="width: 100%" id="preivew" alt="">
                            @error('image')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
                        <div class="mt-[20px]">
                            <label for="" class="text-neutral-50 text-2xl font-black">Name</label>
                            <input type="text" placeholder="Name" name="name"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-[20px]">
                            <label for="" class="text-neutral-50 text-2xl font-black">Professtion</label>
                            <input type="text" placeholder="Profession (Separated by Comma)" name="profession"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                            @error('profession')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-[20px]">
                            <label for="" class="text-neutral-50 text-2xl font-black">Biography</label>
                            <input type="text" placeholder="Biography" name="biograpy"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                            @error('biograpy')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 mb-[30px]">
                            <div></div>
                            <div class="flex items-center justify-end space-x-9 mt-[76px]">
                                <button onclick="window.location.href='{{ route('admin.onboarding.index') }}'"
                                    type="button"
                                    class="py-2 px-12 rounded-xl border border-white text-center text-slate-50 text-base font-black leading-7 tracking-wide">Cancel</button>
                                <button type="submit"
                                    class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Function to handle the file input change event
        function handleFileInputChange() {
            var input = document.getElementById('onboardingImageInput');
            var preview = document.getElementById('preivew');

            var file = input.files[0];

            // Check if a file is selected
            if (file) {
                // Create a FileReader
                var reader = new FileReader();

                // Set up the FileReader to display the image preview once it's loaded
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block'; // Display the image preview
                };

                // Read the file as a data URL (base64 encoding)
                reader.readAsDataURL(file);
                document.getElementById('image').classList.add('hidden')
            } else {
                // If no file is selected, hide the image preview
                // document.getElementById('image').classList.add('block')
                // document.getElementById('image').classList.remove('hidden')
                preview.style.display = 'none';
            }
        }

        // Attach the handleFileInputChange function to the change event of the file input
        document.getElementById('onboardingImageInput').addEventListener('change', handleFileInputChange);
    </script>
@endsection
