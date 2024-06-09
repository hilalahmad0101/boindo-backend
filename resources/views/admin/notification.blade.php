@extends('layouts.app')
@section('title')
    Send mail
@endsection
@section('content')
    <div class="container px-6 mx-auto grid">
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
    </div>
@endsection
@section('script')

<script>
    $("#type").on('change',function(){
        const type=$(this).val();
        
        if(type == 'new_version'){
            $.ajax({
                type:'post',
                url:'{{route('admin.get.version')}}',
                data:{
                    "_token":"{{csrf_token()}}"
                },
                success:(data)=>{
                    $("#version").show();
                    $("#version_link").show();
                    $("#version_data").html(data);
                }
            })
        }else{
             $("#version").hide();
                    $("#version_link").hide();
                    $("#version_data").html();
        }
        
        if(type == 'with_audio'){
            $("#audio").show()
        }else{
            $("#audio").hide()
        }
    })
</script>
@endsection
