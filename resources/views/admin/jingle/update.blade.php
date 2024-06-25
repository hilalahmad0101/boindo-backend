@extends('layouts.new_app')
@section('title')
    ADVERTISING UPLOAD
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">ADVERTISING UPDATE</h1>
        <div>
            <div class="mt-12">
                <div class="text-neutral-50 text-2xl font-black ">Media</div>
                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.jingle.update', ['id' => $jingle->id]) }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-5 gap-3">
                        <div class="rounded-lg p-6 relative mt-[10px]">
                            <label for=""
                                class="text-neutral-50 text-sm font-black flex justify-center space-x-2 items-center">
                                <img src="{{ asset('images/img.png') }}" alt="">
                                <span>Cover</span>
                            </label>
                            <input type="file" accept="images/*" id="onboardingImageInput" name="image"
                                class="absolute inset-0 opacity-0 z-50" />
                            <div class="mt-4" id="image">
                                <img class="" id="" src="{{ asset('storage/' . $jingle->image) }}"
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
                                        <div id="progressBar" class="absolute h-1 bg-white rounded-full" style="width: {{ $jingle->image ? '100':'0' }}%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-white text-sm" id="progressTextImage">{{ $jingle->image ? '100':'0' }}%</div>

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
                                        <div id="progressBar" class="absolute h-1 bg-white rounded-full" style="width: {{ $jingle->audio ? '100':'0' }}%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-white text-sm" id="progressTextDemo">{{ $jingle->audio ? '100':'0' }}%</div>
                            @error('audio')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center onNewUpload">
                            <audio src="{{ asset('storage/' . $jingle->audio) }}" controls></audio>
                        </div>
                    </div>

                    <div class="mt-[70px]">
                        <label for="" class="text-neutral-50 text-2xl font-black">Title</label>
                        <input type="text" placeholder="Title" name="title" value="{{ $jingle->title }}"
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
                                class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        document.getElementById('onboardingImageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                simulateUpload(file, 'progressBar', 'progressTextImage');
                image = file; 
            }
        });

        document.getElementById('onboardingAudioFileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                simulateUpload(file, 'progressWrapperDemo', 'progressTextDemo');
                demo = file; 
                $(".onNewUpload").addClass("hidden")

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
                }
            }, 100); // Adjust the interval timing as needed
        }
    </script>
@endsection
