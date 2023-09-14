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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased overflow-hidden">
    <x-shared.navbar />
    <section class="relative flex items-center w-full bg-white">
        <div class="relative items-center w-full px-5 py-24 mx-auto md:px-12 lg:px-16 max-w-7xl">
            <div class="relative flex-col space-y-20 items-start m-auto align-middle">
                <div>
                    <header class="flex space-x-2 items-center">
                        <svg class="w-20 h-20 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 36 36"
                            preserveAspectRatio="xMidYMid meet" fill="currentColor">
                            <title>bullseye-line</title>
                            <path
                                d="M18,2a15.92,15.92,0,0,0-4.25.59l.77,1.86a14.07,14.07,0,1,1-10,10l-1.86-.78A16,16,0,1,0,18,2Z"
                                class="clr-i-outline clr-i-outline-path-1"></path>
                            <path d="M7.45,15.7a10.81,10.81,0,1,0,8.3-8.26L16.37,9A9.24,9.24,0,1,1,9,16.32Z"
                                class="clr-i-outline clr-i-outline-path-2"></path>
                            <path
                                d="M18,22.09a4.08,4.08,0,0,1-4-3.68l-1.63-.68c0,.09,0,.18,0,.27A5.69,5.69,0,1,0,18,12.31h-.24L18.43,14A4.07,4.07,0,0,1,18,22.09Z"
                                class="clr-i-outline clr-i-outline-path-3"></path>
                            <path
                                d="M8.2,13.34a.5.5,0,0,0,.35.15H12.2l5.37,5.37A1,1,0,0,0,19,17.44L13.53,12V8.51a.5.5,0,0,0-.15-.35L7.79,2.57a.5.5,0,0,0-.85.35v4H3a.5.5,0,0,0-.35.85Z"
                                class="clr-i-outline clr-i-outline-path-4"></path>
                            <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect>
                        </svg>
                        <span class="text-3xl font-black text-main">OUR MISSION</span>
                    </header>
                    <p class="text-lg mt-3 text-justify indent-10 leading-9">
                        Our mission is to provide accurate and efficient employee attendance monitoring solutions using
                        RFID technology. We aim to help organizations streamline their attendance tracking processes by
                        offering a reliable and seamless system that promotes accountability, transparency, and
                        productivity among employees.
                    </p>
                </div>
                <div>
                    <header class="flex space-x-2 items-center">
                        <svg class="w-20 h-20 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792"
                            fill="currentColor">
                            <path
                                d="M1664 960c-95-147-225-273-381-353 40 68 61 146 61 225 0 247-201 448-448 448s-448-201-448-448c0-79 21-157 61-225-156 80-286 206-381 353 171 264 447 448 768 448s597-184 768-448zM944 576c0-26-22-48-48-48-167 0-304 137-304 304 0 26 22 48 48 48s48-22 48-48c0-114 94-208 208-208 26 0 48-22 48-48zm848 384c0 25-8 48-20 69-184 303-521 507-876 507s-692-205-876-507c-12-21-20-44-20-69s8-48 20-69c184-302 521-507 876-507s692 205 876 507c12 21 20 44 20 69z">
                            </path>
                        </svg>
                        <span class="text-3xl font-black text-main">OUR VISION</span>
                    </header>
                    <p class="text-lg mt-3 text-justify indent-10 leading-9">
                        Our vision is to become the leading provider of RFID employee attendance monitoring systems
                        worldwide. We strive to revolutionize traditional attendance tracking methods by leveraging
                        cutting-edge RFID technology to create an innovative and user-friendly system. Through
                        continuous research and development, we aim to set new industry standards and provide
                        organizations with a comprehensive solution that enhances workforce management and enables
                        sustainable growth.
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
