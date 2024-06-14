@extends('layouts.new_app')
@section('title')
    Crate OnBoarding
@endsection
@section('content')
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black">LEGAL</h1>
        <div>
            <div class="mt-12">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-[20px]">
                    @foreach ($legals as $legal)
                        <div class="relative" id="image">
                            <div class="text-neutral-50 text-xl font-normal my-2">{{ $legal->name }}</div>
                            <img class="w-full" src="{{ asset('images/file-upload.svg') }}" alt="">
                            <div class="w-full max-w-md pt-4 flex items-center space-x-2">
                                <div class="flex items-center space-x-2 w-full">
                                    <div id="progressWrapper{{ $legal->id }}"
                                        class="relative w-full h-1 bg-gray-600 rounded-full">
                                        <div id="progressBar{{ $legal->id }}" class="absolute h-1 bg-white rounded-full"
                                            style="width: 0%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-white text-sm" id="progressTextImage{{ $legal->id }}">0%</< /div>
                                <img class="absolute top-[50px] right-[10px]" src="{{ asset('images/pdfimage.png') }}"
                                    alt="">
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('admin.legal.update', ['id' => $legal->id]) }}"
                                    id="pdfForm{{ $legal->id }}">
                                    @csrf
                                    <div class="rounded-lg relative flex items-center justify-end">
                                        <input type="file" accept="application/pdf"
                                            id="onboardingImageInput{{ $legal->id }}" data-id="{{ $legal->id }}"
                                            name="pdf" class="absolute inset-0 opacity-0 z-50" />
                                        <div class="" id="image">
                                            <img class="size-10" src="{{ asset('images/edit.svg') }}" alt="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{-- <form method="POST" enctype="multipart/form-data" action="{{ route('admin.legal.store') }}" id="pdfForm">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
                        <div class="rounded-lg py-6 relative mt-10">
                            <input type="file" accept="application/pdf" id="onboardingImageInput" name="pdf"
                                class="absolute inset-0 opacity-0 z-50" />
                            <div class="" id="image">
                                <img class="w-full" src="{{ asset('images/file-upload.svg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // document.getElementById('onboardingImageInput').addEventListener('change', function() {
        //     if (this.files && this.files[0]) {
        //         const dataId = this.getAttribute('data-id');
        //         console.log(dataId); 
        //         document.getElementById('pdfForm' + dataId).submit();
        //     }
        // });

        $(document).on('change', '[id^="onboardingImageInput"]', function() {
            if (this.files && this.files[0]) {
                console.log("object");
                const file = this.files[0];
                const dataId = $(this).data('id');
            console.log(dataId);
                // console.log(dataId);
                simulateUpload(file, 'progressBar' + dataId, 'progressTextImage' + dataId, dataId);

                document.getElementById('pdfForm' + dataId).submit();

            }
        });

        function simulateUpload(file, progressbar, progressText, dataId) {
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
                    // upload();
                }
            }, 100); // Adjust the interval timing as needed
        }
    </script>
@endsection
