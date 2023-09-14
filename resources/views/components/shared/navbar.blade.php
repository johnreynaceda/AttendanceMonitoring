<div class="border border-main relative z-50">
    <div class="w-full mx-auto bg-white border-b 2xl:max-w-7xl">
        <div x-data="{ open: false }"
            class="relative flex flex-col w-full p-5 py-6 mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between lg:justify-start">
                <a class="text-xs tracking-tight flex space-x-2 items-center text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                    href="/">
                    <img src="{{ asset('images/lnwuLogo.png') }}" class="2xl:h-14 h-10" alt="">
                    <span class="uppercase font-bold text-gray text-main">Lyceum-Northwestern University</span>
                </a>
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                        </path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{ 'flex': open, 'hidden': !open }"
                class="flex-col flex-grow hidden py-10 md:flex lg:py-0 md:justify-end md:flex-row">
                <ul class="space-y-2 list-none md:space-y-0 md:items-center md:inline-flex">

                    <div class="inline-flex items-center gap-2 list-none  lg:ml-auto">
                        <a href="{{ route('attendance') }}"
                            class="inline-flex uppercase items-center justify-center px-4 py-2  hover:text-white font-semibold text-main bg-white border-main border-2 rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-main active:bg-main active:text-white focus-visible:outline-black">
                            Attendance
                        </a>
                        <a href="{{ route('login') }}"
                            class="inline-flex uppercase items-center justify-center px-4 py-2  font-semibold text-white bg-main rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-gray-700 active:bg-gray-800 active:text-white focus-visible:outline-black">
                            Sign In
                        </a>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
</div>
