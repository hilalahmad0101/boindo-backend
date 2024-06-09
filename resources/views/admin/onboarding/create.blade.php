@extends('layouts.app')
@section('title')
    Crate OnBoarding
@endsection
@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Crate OnBoarding
        </h2>
        <form action="{{ route('admin.onboarding.store') }}" method="POST" enctype="multipart/form-data"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Image</span>
                <input type="file" name="image" id="onboardingImageInput"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />

                <img id="onboardingImagePreview" src="#" alt="Image Preview"
                    style="display: none; max-width: 100%; max-height: 200px;">

                @error('image')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>

            <div class="flex mt-6">
                <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Create OnBoarding</span>
                </button>
            </div>
        </form>
    </div>


    <script>
        // Function to handle the file input change event
        function handleFileInputChange() {
            var input = document.getElementById('onboardingImageInput');
            var preview = document.getElementById('onboardingImagePreview');

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
            } else {
                // If no file is selected, hide the image preview
                preview.style.display = 'none';
            }
        }

        // Attach the handleFileInputChange function to the change event of the file input
        document.getElementById('onboardingImageInput').addEventListener('change', handleFileInputChange);
    </script>
@endsection
