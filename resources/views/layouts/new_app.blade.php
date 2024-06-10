<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="{{ asset('style.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    @vite('resources/css/app.css')
</head>

<body>
    <!-- responsive navbar -->
    <nav class="p-10 flex  items-center justify-between lg:hidden shadow mb-6 relative">
        <div>
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        <div id="click_button" class="cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white"
                class="size-14">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
            </svg>
        </div>
        <div id="show_data" class="absolute hidden top-24 left-0 w-full bg-[#303030]">
            <ul class=" ">
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
                <li class="pb-[20px] pt-4 hover:bg-zinc-700 px-[40px]">
                    <a href="" class="flex items-center space-x-3">
                        <img src="../images/home.png" class="" alt="">
                        <span>Home</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="flex items-start  lg:mt-[54px] lg:ml-[38px]">
        <div class="hidden lg:block">
            <nav class="w-[110px] h-[1150px] bg-[#303030] rounded-[20px] mb-10">
                <ul class="flex flex-col justify-center items-center">
                    <li class="pt-[50px]">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </li>
                    <li class="pt-[50px]">
                        <a href="">
                            <img src="{{ asset('images/home.png') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Home</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.admin.index') }}">
                            <img src="{{ Request::routeIs('admin.admin.index') ? asset('images/user-yellow.png') : asset('images/user-profile.png') }}"
                                class="mx-auto" alt="">
                                <span class="text-center text-neutral-500 text-xs font-normal ">Admin</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.user.index') }}">
                            <img src="{{ asset('images/users-white.png') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">User</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.sub-category.index') }}">
                            <img src="{{ asset('images/category-white.svg') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Sub Category</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.actor.index') }}">
                            <img src="{{ asset('images/ads.svg') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Actor</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.jingle.index') }}">
                            <img src="{{ asset('images/ads.svg') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Jingle</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.onboarding.index') }}">
                            <img src="{{ asset('images/ads.svg') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Advertising</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.review.index') }}">
                            <img src="{{ asset('images/ads.svg') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Review</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.legal.index') }}">
                            <img src="{{ asset('images/ads.svg') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Legal</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.notification.index') }}">
                            <img src="{{ asset('images/ads.svg') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Notification</span>
                        </a>
                    </li>
                    <li class="pt-[50px]">
                        <a href="{{ route('admin.logout') }}">
                            <img src="{{ asset('images/ads.svg') }}" class="mx-auto" alt="">
                            <span class="text-center text-neutral-500 text-xs font-normal ">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="w-full">
            <main class="container mx-auto w-full lg:pl-[60px] lg:px-3 px-3">
                <!-- top menu -->
                <div class="flex justify-between items-center flex-wrap">
                    <div class="flex items-center max-w-4xl container md:mx-[0px] mx-auto gap-5 flex-wrap">
                        <div
                            class=" lg:w-[268px] w-full p-6 bg-slate-700 rounded-lg justify-center items-center gap-2.5 inline-flex">
                            <div class=" grow shrink basis-0 flex-col justify-start items-start gap-9 inline-flex">
                                <div class=" justify-start items-start gap-3.5 inline-flex">
                                    <div
                                        class=" p-2.5 bg-blue-500 rounded-full justify-center items-center gap-2.5 flex">
                                        <div class=" w-6 h-6 relative"></div>
                                    </div>
                                    <div class=" flex-col justify-start items-start gap-1 inline-flex">
                                        <div class="TotalEmployees text-white text-base font-medium  tracking-tight">
                                            USER
                                        </div>
                                        <span class="234 text-white text-2xl font-medium ">{{ \App\Models\User::count()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class=" lg:w-[268px] w-full p-6 bg-[#2D4B32] rounded-lg justify-center items-center gap-2.5 inline-flex">
                            <div class=" grow shrink basis-0 flex-col justify-start items-start gap-9 inline-flex">
                                <div class=" justify-start items-start gap-3.5 inline-flex">
                                    <div
                                        class=" p-2.5 bg-blue-500 rounded-full justify-center items-center gap-2.5 flex">
                                        <div class=" w-6 h-6 relative"></div>
                                    </div>
                                    <div class=" flex-col justify-start items-start gap-1 inline-flex">
                                        <div class="TotalEmployees text-white text-base font-medium  tracking-tight">
                                            CONTENT
                                        </div>
                                        <span class="234 text-white text-2xl font-medium ">{{ \App\Models\Content::count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class=" lg:w-[268px] w-full p-6 bg-[#512D2F] rounded-lg justify-center items-center gap-2.5 inline-flex">
                            <div class=" grow shrink basis-0 flex-col justify-start items-start gap-9 inline-flex">
                                <div class=" justify-start items-start gap-3.5 inline-flex">
                                    <div
                                        class=" p-2.5 bg-blue-500 rounded-full justify-center items-center gap-2.5 flex">
                                        <div class=" w-6 h-6 relative"></div>
                                    </div>
                                    <div class=" flex-col justify-start items-start gap-1 inline-flex">
                                        <div class="TotalEmployees text-white text-base font-medium  tracking-tight">
                                            COST
                                        </div>
                                        <span class="234 text-white text-2xl font-medium ">{{ \App\Models\ActorProfile::count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col  items-end">
                        <img src="{{ asset('images/user-profile.png') }}" class="w-[40px] h-[40px] mx-auto flex justify-end"
                            alt="">
                        <p class="text-gray-400 text-center font-roboto text-sm not-italic font-normal leading-normal">
                            {{ Auth::user()->name }}
                        </p>
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    @if (session()->has('success'))
        <script>
            toastr['success']("{{ session('success') }}")
        </script>
    @elseif(session()->has('error'))
        <script>
            toastr['error']("{{ session('error') }}")
        </script>
    @endif

    <script>
        $("#click_button").on('click', function() {
            $("#show_data").toggleClass('block hidden');
        });
    </script>

    @yield('script')
</body>

</html>
