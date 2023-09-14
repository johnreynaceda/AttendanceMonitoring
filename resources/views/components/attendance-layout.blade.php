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
    <!-- Alpine Plugins -->
    <script src="https://unpkg.com/@victoryoalli/alpinejs-moment@1.0.0/dist/moment.min.js" defer></script>
    <!-- Alpine Core -->

    <!-- Scripts -->

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

<body class="font-sans antialiased relative">

    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
        xmlns:svgjs="http://svgjs.dev/svgjs" class="fixed top-0 left-0 opacity-20 bottom-0 right-0 h-full-w-full"
        preserveAspectRatio="none" viewBox="0 0 1440 800">
        <g mask="url(&quot;#SvgjsMask1140&quot;)" fill="none">
            <path
                d="M -1323.2397101521688,294 C -1179.24,376 -891.24,705.6 -603.2397101521688,704 C -315.24,702.4 -171.24,281.6 116.76028984783125,286 C 404.76,290.4 572.11,778.6 836.7602898478312,726 C 1101.41,673.4 1319.35,163.6 1440,23"
                stroke="rgba(146, 39, 65, 0.27)" stroke-width="2"></path>
            <path
                d="M -1337.4818682588582,688 C -1193.48,575 -905.48,123 -617.4818682588582,123 C -329.48,123 -185.48,636.8 102.51813174114181,688 C 390.52,739.2 555.02,368.6 822.5181317411418,379 C 1090.01,389.4 1316.5,667.8 1440,740"
                stroke="rgba(146, 39, 65, 0.27)" stroke-width="2"></path>
            <path
                d="M -516.4392940420187,355 C -372.44,373 -84.44,458.4 203.56070595798136,445 C 491.56,431.6 635.56,228.2 923.5607059579813,288 C 1211.56,347.8 1540.27,740.4 1643.5607059579813,744 C 1746.85,747.6 1480.71,393.6 1440,306"
                stroke="rgba(146, 39, 65, 0.27)" stroke-width="2"></path>
            <path
                d="M -127.40724999805298,355 C 16.59,402 304.59,650.2 592.592750001947,590 C 880.59,529.8 1024.59,68.6 1312.592750001947,54 C 1600.59,39.4 2007.11,480.2 2032.592750001947,517 C 2058.07,553.8 1558.52,293.8 1440,238"
                stroke="rgba(146, 39, 65, 0.27)" stroke-width="2"></path>
            <path
                d="M -381.64304584492544,183 C -237.64,244.6 50.36,516.8 338.35695415507456,491 C 626.36,465.2 770.36,36 1058.3569541550746,54 C 1346.36,72 1702.03,548 1778.3569541550746,581 C 1854.69,614 1507.67,291.4 1440,219"
                stroke="rgba(146, 39, 65, 0.27)" stroke-width="2"></path>
            <path
                d="M -13.357177112667046,510 C 130.64,467.4 418.64,306.6 706.642822887333,297 C 994.64,287.4 1138.64,477.2 1426.6428228873328,462 C 1714.64,446.8 2143.97,173.6 2146.642822887333,221 C 2149.31,268.4 1581.33,603.4 1440,699"
                stroke="rgba(146, 39, 65, 0.27)" stroke-width="2"></path>
            <path
                d="M -1225.671235112697,499 C -1081.67,423 -793.67,109.6 -505.6712351126972,119 C -217.67,128.4 -73.67,537 214.32876488730278,546 C 502.33,555 689.19,126.6 934.3287648873028,164 C 1179.46,201.4 1338.87,619.2 1440,733"
                stroke="rgba(146, 39, 65, 0.27)" stroke-width="2"></path>
        </g>
        <defs>
            <mask id="SvgjsMask1140">
                <rect width="1440" height="800" fill="#ffffff"></rect>
            </mask>
        </defs>
    </svg>
    <div class="bg-gradient-to-tr from-gray-100 via-main to-main relative overflow-hidden ">
        <img src="{{ asset('images/lnwuLogo.png') }}" class="absolute left-0 opacity-10 -bottom-48 h-96" alt="">
        <div class="py-8 mx-auto max-w-7xl flex justify-center items-center">
            <div class="flex flex-col space-y-3 space-x-2 items-center ">
                <h1 class="uppercase text-3xl font-bold text-white">Lyceum-Northwestern University</h1>
                <div class="div flex space-x-4 items-center text-6xl text-gray-50 font-bold">
                    <span>{{ now()->format('F d, Y') }}</span>
                    <div x-data="clock()" x-init="startClock" class="text-6xl text-gray-50 font-bold">
                        <span x-text="hours"></span>:<span x-text="minutes"></span>:<span x-text="seconds"></span> <span
                            x-text="ampm"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <main class="relative">
        {{ $slot }}
    </main>
    <script>
        function clock() {
            return {
                hours: '00',
                minutes: '00',
                seconds: '00',
                ampm: 'AM',
                startClock() {
                    setInterval(() => {
                        const now = new Date();
                        let hours = now.getHours();
                        const minutes = String(now.getMinutes()).padStart(2, '0');
                        const seconds = String(now.getSeconds()).padStart(2, '0');
                        let ampm = 'AM';

                        if (hours > 12) {
                            hours -= 12;
                            ampm = 'PM';
                        }

                        this.hours = String(hours).padStart(2, '0');
                        this.minutes = minutes;
                        this.seconds = seconds;
                        this.ampm = ampm;
                    }, 1000);
                },
            };
        }
    </script>
    @livewireScripts
</body>

</html>
