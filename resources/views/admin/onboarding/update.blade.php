@extends('layouts.new_app')
@section('title')
    Update OnBoarding
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">UPDATE ONBOARDING</h1>
        <div>
            <div class="mt-12">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.onboarding.update', ['id' => $onboarding->id]) }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="  rounded-lg p-6">
                            <input type="file" id="onboardingImageInput" name="image"
                                class="absolute inset-0 opacity-0 z-50" />
                            <img class="" id="edit_image" src="{{ asset('storage/' . $onboarding->image) }}"
                                alt="">
                            <div class="" id="image">
                                {{-- <img class="" src="{{ asset('images/file-upload.svg') }}" alt=""> --}}
                            </div>
                            <img src="" style="width: 100%" id="preivew" alt="">
                            @error('image')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div></div>
                        <div></div>
                        <div class="flex items-center justify-end space-x-9 mt-[76px]">
                            <button onclick="window.location.href='{{ route('admin.onboarding.index') }}'" type="button"
                                class="py-2 px-12 rounded-xl border border-white text-center text-slate-50 text-base font-black leading-7 tracking-wide">Cancel</button>
                            <button type="submit"
                                class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Update</button>
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
                document.getElementById('edit_image').classList.add('hidden')
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
