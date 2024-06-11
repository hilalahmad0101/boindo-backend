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
                        <div>
                            <div class="relative" id="image">
                                <div class="text-neutral-50 text-xl font-normal my-2">{{ $legal->name }}</div>
                                <img class="w-full" src="{{ asset('images/file-upload.svg') }}" alt="">
                                <img class="absolute top-[40px] right-[10px]" src="{{ asset('images/pdfimage.png') }}"
                                    alt="">
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('admin.legal.update', ['id' => $legal->id]) }}" id="pdfForm">
                                    @csrf
                                    <div class="rounded-lg py-6 relative flex items-center justify-end">
                                        <input type="file" accept="application/pdf" id="onboardingImageInput"
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

    <script>
        document.getElementById('onboardingImageInput').addEventListener('change', function() {
            // Check if a file is selected
            if (this.files && this.files[0]) {
                // Submit the form
                document.getElementById('pdfForm').submit();
            }
        });
    </script>
@endsection
