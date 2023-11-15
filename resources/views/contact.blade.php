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

<body class="font-sans antialiased ">
    <x-shared.navbar />
    <section class="relative flex items-center w-full bg-white">
        <div class="relative items-center w-full px-5 py-24 mx-auto md:px-12 lg:px-16 max-w-7xl">
            <div class="relative flex-col space-y-20 items-start m-auto align-middle">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 lg:gap-24">
                    <div>
                        <header class="flex space-x-2 items-center">
                            <svg class="w-20 h-20 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" aria-hidden="true">
                                <path
                                    d="M17.62 10.75a.77.77 0 01-.77-.77c0-.37-.37-1.14-.99-1.81-.61-.65-1.28-1.03-1.84-1.03a.77.77 0 01-.77-.77c0-.42.35-.77.77-.77 1 0 2.05.54 2.97 1.51.86.91 1.41 2.04 1.41 2.86 0 .43-.35.78-.78.78zM21.23 10.75a.77.77 0 01-.77-.77c0-3.55-2.89-6.43-6.43-6.43a.77.77 0 01-.77-.77c0-.42.34-.78.76-.78C18.42 2 22 5.58 22 9.98c0 .42-.35.77-.77.77z">
                                </path>
                                <path
                                    d="M11.79 14.21l-3.27 3.27c-.36-.32-.71-.65-1.05-.99a28.414 28.414 0 01-2.79-3.27c-.82-1.14-1.48-2.28-1.96-3.41C2.24 8.67 2 7.58 2 6.54c0-.68.12-1.33.36-1.93.24-.61.62-1.17 1.15-1.67C4.15 2.31 4.85 2 5.59 2c.28 0 .56.06.81.18.26.12.49.3.67.56l2.32 3.27c.18.25.31.48.4.7.09.21.14.42.14.61 0 .24-.07.48-.21.71-.13.23-.32.47-.56.71l-.76.79c-.11.11-.16.24-.16.4 0 .08.01.15.03.23.03.08.06.14.08.2.18.33.49.76.93 1.28.45.52.93 1.05 1.45 1.58.36.35.71.69 1.06.99z"
                                    opacity=".4"></path>
                                <path
                                    d="M21.97 18.33a2.54 2.54 0 01-.25 1.09c-.17.36-.39.7-.68 1.02-.49.54-1.03.93-1.64 1.18-.01 0-.02.01-.03.01-.59.24-1.23.37-1.92.37-1.02 0-2.11-.24-3.26-.73s-2.3-1.15-3.44-1.98c-.39-.29-.78-.58-1.15-.89l3.27-3.27c.28.21.53.37.74.48.05.02.11.05.18.08.08.03.16.04.25.04.17 0 .3-.06.41-.17l.76-.75c.25-.25.49-.44.72-.56.23-.14.46-.21.71-.21.19 0 .39.04.61.13.22.09.45.22.7.39l3.31 2.35c.26.18.44.39.55.64.1.25.16.5.16.78z">
                                </path>
                            </svg>
                            <span class="text-3xl font-black text-main">CONTACT US</span>
                        </header>
                        <div class="mt-3">
                            <p>Please fill up below details and we will be in touch with you soon with the reply you
                                desired.</p>

                            <livewire:contact-us />
                        </div>
                    </div>
                    <div class="">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.5777060724213!2d120.32800647589947!3d16.03548394033894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339142aa92134ed7%3A0xe692fb6026fd2b58!2sLYCEUM-NORTHWESTERN%20UNIVERSITY!5e0!3m2!1sen!2sph!4v1694004965319!5m2!1sen!2sph"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>
    @livewireScripts
</body>

</html>
