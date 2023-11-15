<div>
    <section>
        <div class="grid grid-cols-4 gap-5">
            <div class=" p-5 border rounded-lg  bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Total Department</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-main">
                        <path
                            d="M21 19H23V21H1V19H3V4C3 3.44772 3.44772 3 4 3H14C14.5523 3 15 3.44772 15 4V19H19V11H17V9H20C20.5523 9 21 9.44772 21 10V19ZM5 5V19H13V5H5ZM7 11H11V13H7V11ZM7 7H11V9H7V7Z">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <span class="text-3xl font-bold text-gray-700">{{ $department }}</span>
                </div>

            </div>
            <div class=" p-5 border rounded-lg  bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Total Employees</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-main">
                        <path
                            d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z">
                    </svg>
                </div>
                <div class="">
                    <span class="text-3xl font-bold text-gray-700">{{ $employee }}</span>
                </div>

            </div>
            <div class=" p-5 border rounded-lg  bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Today Attendance</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-main">
                        <path
                            d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM8 14V16H6V14H8ZM18 14V16H10V14H18ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <span class="text-3xl font-bold text-gray-700">{{ $attendance }}</span>
                </div>

            </div>
            <div class=" p-5 border rounded-lg  bg-white shadow">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600 font-medium">Today Message</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-main">
                        <path
                            d="M5.45455 15L1 18.5V3C1 2.44772 1.44772 2 2 2H17C17.5523 2 18 2.44772 18 3V15H5.45455ZM4.76282 13H16V4H3V14.3851L4.76282 13ZM8 17H18.2372L20 18.3851V8H21C21.5523 8 22 8.44772 22 9V22.5L17.5455 19H9C8.44772 19 8 18.5523 8 18V17Z">
                        </path>
                    </svg>
                </div>
                <div class="">
                    <span class="text-3xl font-bold text-gray-700">1</span>
                </div>

            </div>
        </div>

    </section>
    <div class="mt-10">
        <div class="bg-white p-6 rounded-xl shadow">
            <header class="text-2xl font-bold text-main flex space-x-1 items-center">
                <span> ATTENDANCE FOR TODAY</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-main w-7 h-7">
                    <path
                        d="M17.6177 5.9681L19.0711 4.51472L20.4853 5.92893L19.0319 7.38231C20.2635 8.92199 21 10.875 21 13C21 17.9706 16.9706 22 12 22C7.02944 22 3 17.9706 3 13C3 8.02944 7.02944 4 12 4C14.125 4 16.078 4.73647 17.6177 5.9681ZM12 20C15.866 20 19 16.866 19 13C19 9.13401 15.866 6 12 6C8.13401 6 5 9.13401 5 13C5 16.866 8.13401 20 12 20ZM11 8H13V14H11V8ZM8 1H16V3H8V1Z">
                    </path>
                </svg>
            </header>
            <div class="mt-5">
                {{ $this->table }}
            </div>
        </div>
    </div>
</div>
