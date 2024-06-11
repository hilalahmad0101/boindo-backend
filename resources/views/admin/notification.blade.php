@extends('layouts.new_app')
@section('title')
    Send mail
@endsection
@section('content')
    {{-- <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
           Send Mail
        </h2>
        <form method="POST" action="{{ route('admin.notification.send') }}" enctype="multipart/form-data"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Title</span>
                <input name="title" type="text"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('title')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Select Option</span> 
                <select name='type' id='type' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    <option value='simple_notification'>Simple Notification</option>
                    <option value='with_audio'>With Audio</option>
                    <option value='new_version'>Install New Version</option>
                </select>  
            </label>
            
             <label class="block text-sm" id='version' style='display:none;'>
                <span class="text-gray-700 dark:text-gray-400">Select Option</span> 
                <select name='version' id='version_data' class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                    <option value='simple_notification'>Simple Notification</option>
                    <option value='with_audio'>With Audio</option>
                    <option value='new_version'>Install New Version</option>
                </select>  
            </label>
            
            <label class="block text-sm" id='version_link' style='display:none;'>
                <span class="text-gray-700 dark:text-gray-400">Link</span>
                <input name="link" type="text"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                 
            </label>
            
             <label class="block text-sm" id='audio' style='display:none;'>
                <span class="text-gray-700 dark:text-gray-400">Upload Audio</span>
                <input name="audio" type="file" accept='audio/*'
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </label>  
            
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Message</span>
                <input name="message" type="text"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                @error('message')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </label> 
            
            

            <div class="flex mt-6">
                <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    <span>Send Mail</span>
                </button>
            </div>
        </form>
    </div> --}}


    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">CREATE NOTIFICATION</h1>
        <div>
            <div class="mt-12">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.notification.send') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="mt-[20px]">
                            <label for="" class="text-neutral-50 text-2xl font-black">Title</label>
                            <input type="text" placeholder="Title" name="title"
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                            @error('title')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-[20px]">
                            <label for="" class="text-neutral-50 text-2xl font-black">Option</label>
                            <select name='type' id='type'
                                class="w-full bg-[#383838]  py-4 px-4 text-white outline-none border-none rounded-2xl mt-5">
                                <option value='simple_notification'>Simple Notification</option>
                                <option value='with_audio'>With Audio</option>
                                <option value='new_version'>Install New Version</option>
                            </select>
                            @error('type')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <label class=" mt-[20px]" id='version' style='display:none;'>
                            <span class="text-neutral-50 text-2xl font-black">Select Version</span>
                            <select name='version' id='version_data'
                                class="block w-full mt-5 bg-[#383838] py-4 px-4 text-white outline-none border-none rounded-2xl">
                            </select>
                        </label>

                        <label class=" mt-[20px]" id='version_link' style='display:none;'>
                            <span class="text-neutral-50 text-2xl font-black">Link</span>
                            <input name="link" type="text"
                                class="block w-full mt-5 bg-[#383838] py-4 px-4 text-white outline-none border-none rounded-2xl" />
                        </label>

                        <label class=" mt-[20px]" id='audio' style='display:none;'>
                            <span class="text-neutral-50 text-2xl font-black">Upload Audio</span>
                            <input name="audio" type="file" accept='audio/*'
                                class="block w-full mt-5 bg-[#383838] py-4 px-4 text-white outline-none border-none rounded-2xl" />
                        </label>

                        <label class="mt-[20px]">
                            <span class="text-neutral-50 text-2xl font-black">Message</span>
                            <input name="message" type="text"
                                class="block w-full mt-5 bg-[#383838] py-4 px-4 text-white outline-none border-none rounded-2xl" />
                            @error('message')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </label>

                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 mb-[30px]">
                        <div></div>
                        <div class="flex items-center justify-end space-x-9 mt-[76px]">
                            <button onclick="window.location.href='{{ route('admin.notification.index') }}'" type="button"
                                class="py-2 px-12 rounded-xl border border-white text-center text-slate-50 text-base font-black leading-7 tracking-wide">Cancel</button>
                            <button type="submit"
                                class="py-2 px-12 bg-[#FFA800] rounded-xl border border-[#FFA800] text-center text-[#5A5A5C] text-base font-black leading-7 tracking-wide">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#type").on('change', function() {
            const type = $(this).val();

            if (type == 'new_version') {
                $.ajax({
                    type: 'post',
                    url: '{{ route('admin.get.version') }}',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: (data) => {
                        $("#version").show();
                        $("#version_link").show();
                        $("#version_data").html(data);
                    }
                })
            } else {
                $("#version").hide();
                $("#version_link").hide();
                $("#version_data").html();
            }

            if (type == 'with_audio') {
                $("#audio").show()
            } else {
                $("#audio").hide()
            }
        })
    </script>
@endsection
