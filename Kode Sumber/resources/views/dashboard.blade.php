<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="cupcake">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <!-- {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}} -->
    <script async src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- {{-- Daisy UI --}} -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.2.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <style>
        .dataTables_length label select {
            margin-right: 10px;
            margin-left: 10px;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        {{-- Header --}}
        <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start">
                        <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                            class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                            <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <a href="{{ route('admin.home_index') }}" class="text-xl font-bold flex items-center lg:ml-2.5">                    
                            <span class="self-center whitespace-nowrap">
                               <img src="{{ asset('logo.svg') }}" alt="logo" class="w-10">
                                    
                            </span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        {{-- Toggle Mobile Nav --}}
                        <button id="toggleSidebarMobileSearch" type="button"
                            class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg"></button>
                        <div class="space-x-4 flex">
                            <button class="border-2 p-2 rounded-lg mx-auto flex items-center shadow-sm">
                                <i class="fas fa-user text-gray-500 text-lg ml-4"></i>
                                <p class="font-medium text-gray-500 mx-2">Admin</p>
                                {{-- <span class="indicator-item indicator-top indicator-end badge badge-secondary py-3 font-semibold text-gray-500"><i class="fas fa-bell text-gray-500 text-lg"></i>&nbsp;99+</span> --}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        {{-- Header END --}}

        {{-- Side Bar-Left --}}
        <div class="flex overflow-hidden bg-white pt-16">
            <aside id="sidebar"
                class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
                aria-label="Sidebar">
                <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex-1 px-3 bg-white divide-y space-y-1">
                            <ul class="space-y-2 pb-2">
                                <li>
                                    <a href="#"
                                        class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                                        <svg class="w-6 h-6 text-gray-500 group-hover:text-gray-900 transition duration-75"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                        </svg>
                                        <span class="ml-3">Dashboard</span>
                                    </a>
                                </li>                            
                                <li>
                                    <a href="{{ route('admin.user.index') }}"
                                        class="{{ \Route::is('admin.user.*') ? 'text-[#E1B168] font-bold' : "text-black"}} text-base  font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <i class="fa-solid fa-user pl-1 w-6 h-full my-auto"></i>
                                        <span class="ml-3 flex-1 whitespace-nowrap">User</span>
                                    </a>
                                </li>          
                                <li>
                                    <a href="{{ route('admin.menu.index') }}"
                                        class="{{ \Route::is('admin.menu.*') ? 'text-[#E1B168] font-bold' : "text-black"}} text-base  font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                        <i class="fa-solid fa-bowl-food pl-1 w-6 h-full my-auto"></i>
                                        <span class="ml-3 flex-1 whitespace-nowrap">Menu</span>
                                    </a>
                                </li>                                
                                                     
                            </ul>                           
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        {{-- Side Bar-Left End --}}

        {{-- Content --}}
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full max-w-6xl bg-gray-50 relative overflow-y-auto lg:ml-64 w-full ">
            <main class="h-full ">
                <div class="pt-6 pl-4 mb-24 w-full">
                    <div
                        class="max-w-6xl mx-auto w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        @if ($errors->all())
                        <div class="alert bg-red-500 flex flex-col gap-2 text-white font bold mb-5" role="alert">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                    @endif
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    {{-- <div class="absolute inset-x-0 bottom-0">
        <p class="text-center text-sm text-gray-500 my-10 w-full pl-64">
            &copy; 2022-2023 <a href="#" class="hover:underline" target="_blank">Zidan</a>. All
            rights reserved.
        </p>
    </div> --}}
    {{-- Content END --}}

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    @stack('datatables')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error2'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('error2') }}'
            })
        </script>
    @endif
    @if (session('success'))
        <script>
            const ToastSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            ToastSuccess.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    </div>
</body>
