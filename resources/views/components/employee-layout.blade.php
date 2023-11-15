<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    @stack('scripts')
</head>

<body class="font-sans antialiased bg-gray-100">

    <div class="border-b bg-white border-main">
        <div class="w-full mx-auto bg-white 2xl:max-w-7xl">
            <div x-data="{ open: false }"
                class="relative flex flex-col w-full p-5 mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="flex flex-row items-center justify-between lg:justify-start">
                    <a class="text-xs tracking-tight flex space-x-2 items-center text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                        href="/">
                        <img src="{{ asset('images/lnwuLogo.png') }}" class="2xl:h-14 h-10" alt="">
                        {{-- <span class="uppercase font-bold text-gray text-main">Lyceum-Northwestern University</span> --}}
                    </a>
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16">
                            </path>
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col flex-grow hidden py-10 md:flex lg:py-0 md:justify-end md:flex-row">
                    <ul class="space-y-2 list-none md:space-y-0 md:items-center md:inline-flex">
                        <li>
                            <a href="{{ route('employee.dashboard') }}"
                                class="{{ request()->routeIs('employee.dashboard') ? 'text-main' : '' }} px-2 py-8 text-sm text-gray-500 border-b-2 border-transparent lg:px-6  md:px-3 hover:text-main">
                                Dashboard

                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee.schedule') }}"
                                class="{{ request()->routeIs('employee.schedule') ? 'text-main' : '' }} px-2 py-8 text-sm text-gray-500 border-b-2 border-transparent lg:px-6  md:px-3 hover:text-main">
                                Schedule

                            </a>
                        </li>
                        <li>
                            <a href="{{ route('employee.my-attendance') }}"
                                class="{{ request()->routeIs('employee.my-attendance') ? 'text-main' : '' }} px-2 py-8 text-sm text-gray-500 border-b-2 border-transparent lg:px-6  md:px-3 hover:text-main">
                                My Attendance

                            </a>
                        </li>
                        {{-- <li>
                            <a href="#"
                                class="px-2 py-8 text-sm text-gray-500 border-b-2 border-transparent lg:px-6  md:px-3 hover:text-main">
                                My Account

                            </a>
                        </li> --}}
                        <li>
                            <div class="relative flex-shrink-0 ml-2 2xl:ml-5" @click.away="open = false"
                                x-data="{ open: false }">
                                <div>
                                    <button @click="open = !open" class="flex space-x-3 items-center group">

                                        <div class="flex space-x-5 items-center ">
                                            <div class="flex flex-col text-left">
                                                <h1 class="font-bold text-main group-hover:text-blue-700 uppercase">
                                                    {{ auth()->user()->name }}</h1>
                                                <span class="leading-3 text-gray-500 text-sm">Administrator</span>
                                            </div>
                                            <div>
                                                <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="h-6 w-6 fill-gray-500 transition-transform duration-200 transform group-hover:fill-blue-700 rotate-0"">
                                                    <path d="M12 16L6 10H18L12 16Z"></path>
                                                </svg>
                                            </div>
                                        </div>


                                    </button>
                                </div>

                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1" style="display: none;">
                                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">
                                        Your Profile
                                    </a>


                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="#"
                                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                            class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                                            id="user-menu-item-2">
                                            Sign out
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <main class="mt-10 px-4 mx-auto max-w-7xl">
        <header class="text-xl uppercase font-semibold text-main">
            @yield('title')
        </header>
        <div class="mt-5">
            {{ $slot }}
        </div>
    </main>

    @livewireScripts
</body>

</html>
