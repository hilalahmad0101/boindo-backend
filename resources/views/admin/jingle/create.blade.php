@extends('layouts.new_app')
@section('title')
    ADVERTISING UPLOAD
@endsection
@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/tagify.css') }}">

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Create Jingle
        </h2>
        <form class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800" action="{{ route('admin.jingle.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Title</span>
                <input type="text" name="title"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('title')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>


            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Image</span>
                <input type="file" name="image"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('image')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>


            <label class="block text-sm my-2">
                <span class="text-gray-700 dark:text-gray-400">Audio</span>
                <input type="file" name="audio"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('audio')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <div class="flex mt-6">
                <button type="submit"
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Create Jingle</span>
                </button>
            </div>
        </form>
    </div> --}}


    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">ADVERTISING UPLOAD</h1>
        <div>
            <div class="mt-12">
                <div class="text-neutral-50 text-2xl font-black ">Media</div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.jingle.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
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
                                        <div id="progressBar" class="absolute h-1 bg-white rounded-full" style="width: 0%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-white text-sm" id="progressTextImage">0%</div>

                            {{-- <img src="" style="width: 100%" class="mt-4" id="previewImage" alt=""> --}}
                            @error('image')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="rounded-lg p-6 mt-[10px]">
                            <label for=""
                                class="text-neutral-50 text-sm font-black flex mb-3 justify-center space-x-2 items-center">
                                <img src="{{ asset('images/jingle.png') }}" alt="">
                                <span>Jingle</span>
                            </label>
                            {{-- <audio id="previewDemoAudio" controls style="display:none;" class="mt-5"></audio> --}}
                            <div class="relative">
                                <input type="file" id="onboardingAudioFileInput" name="audio" accept="audio/*"
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
                                        <div id="progressBar" class="absolute h-1 bg-white rounded-full" style="width: 0%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-white text-sm" id="progressTextDemo">0%</div>
                            @error('audio')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-[70px]">
                        <label for="" class="text-neutral-50 text-2xl font-black">Title</label>
                        <input type="text" placeholder="Title" name="title"
                            class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                        @error('title')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div></div>
                        <div class="flex items-center justify-end space-x-9 mt-[76px]">
                            <button onclick="window.location.href='{{ route('admin.onboarding.index') }}'" type="button"
                                class="py-2 px-12 rounded-xl border border-white text-center text-slate-50 text-base font-black leading-7 tracking-wide">Cancel</button>
                            <button type="submit"
                                class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <script>
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

        function handleFileInputChangeAuido() {
            var input = document.getElementById('onboardingFileInput');
            var audioPreview = document.getElementById('previewAudio');

            var file = input.files[0];

            // Check if a file is selected
            if (file) {
                // Create a FileReader
                var reader = new FileReader();

                // Set up the FileReader to display the preview once it's loaded
                reader.onload = function(e) {
                    if (file.type.startsWith('audio/')) {
                        audioPreview.src = e.target.result;
                        audioPreview.style.display = 'block'; // Display the audio preview
                    }
                };

                // Read the file as a data URL (base64 encoding)
                reader.readAsDataURL(file);
                document.getElementById('audio_image').classList.add('hidden')

            } else {
                // If no file is selected, hide both previews
                audioPreview.style.display = 'none';
            }
        }

        // Attach the handleFileInputChange function to the change event of the file input
        document.getElementById('onboardingFileInput').addEventListener('change', handleFileInputChangeAuido);
    </script> --}}
@endsection


@section('script')
    <script>
        document.getElementById('onboardingImageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                simulateUpload(file, 'progressBar', 'progressTextImage');
                image = file;
                isImageComplete = true;

            }
        });

        document.getElementById('onboardingAudioFileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                simulateUpload(file, 'progressWrapperDemo', 'progressTextDemo');
                demo = file;
                isDemoComplete = true;

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
    </script>
@endsection
