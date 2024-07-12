<div class="">
    <nav class=" border-green-200 dark:bg-green-900 dark:border-green-700 z-50">
        <div
            class="w-screen-xl flex flex-wrap items-center justify-between mx-auto sm:py-1 md:py-3 sm:px-2 md:px-32 lg:px-72">
            <div class="" :class="{ 'hidden': atTop }">
                <div class="grid grid-cols-12 gap-4 items-center">
                    <div class="col-span-2 flex space-x-4">
                        <div class="hidden md:block">
                            <button :class="{ 'hidden': atTop }"
                                class="text-gray-700 font-medium rounded-full px-2.5 py-2.5 ring ring-gray-300/50"
                                type="button" data-drawer-target="drawer-nav" data-drawer-show="drawer-nav"
                                aria-controls="drawer-nav">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                            </button>
                        </div>
                        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse h-12">
                            <div class="text-4xl">🇹🇿</div>
                            <img src="{{ asset('assets/images/logo.png') }}" class="h-full">
                        </a>
                    </div>
                    <div class="col-span-10">

                        <input type="text" id="search"
                            class="block p-2 w-full z-20 text-sm text-gray-900 bg-green-50 focus:bg-gray-50 rounded-md border-transparent focus:ring-0 focus:border-gray-100"
                            placeholder="Search product items..." />
                    </div>
                </div>
            </div>
            <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse h-12 md:hidden">
                <div class="text-4xl">🇹🇿</div>
                <img src="{{ asset('assets/images/logo-2.png') }}" class="h-full">
            </a>
            <button data-collapse-toggle="navbar-multi-level" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-100 rounded-lg md:hidden focus:outline-none focus:ring-0 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-multi-level" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul :class="{ 'hidden': !atTop }"
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-inherit rounded-lg sm:bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-inherit dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @foreach ($menus as $menu)
                        <li>
                            <button id="{{ $menu->slug }}Link" data-dropdown-toggle="{{ $menu->slug }}"
                                class="flex items-center justify-between text-sm w-full py-2 px-3 text-gray-300 hover:text-gray-50 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                                :class="{ '!text-sky-900 font-bold': !atTop }">
                                {{ $menu->name }}
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="{{ $menu->slug }}"
                                class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-b-md shadow w-screen min-h-32 dark:bg-gray-700 dark:divide-gray-600">
                                <div class="flex md:mx-80 px-20 sm:py-1 md:py-3 md:px-0 ">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 md:grid md:grid-flow-col justify-start"
                                        aria-labelledby="dropdownLargeButton">
                                        @foreach ($menu->categories as $category)
                                            <li class="px-4">
                                                <a href="{{ route('public_items', $category->slug) }}"
                                                    class="block py-2 font-bold hover:text-sky-900 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</a>
                                                <ul>
                                                    @foreach ($category->sub_categories as $sub_category)
                                                        <li>
                                                            <a href="{{ route('public_items', $sub_category->slug) }}"
                                                                class="block py-1 hover:text-sky-800">{{ $sub_category->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </li>
                    @endforeach
                    {{-- <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between text-sm w-full py-2 px-3 text-gray-300 hover:text-gray-50 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Electronics
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 min-h-32 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="flex w-full">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 w-full"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                    </li>
                                </ul>
    
                            </div>
                        </div>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink2" data-dropdown-toggle="dropdownNavbar2"
                            class="flex items-center justify-between text-sm font-normal w-full py-2 px-3 text-gray-300 hover:text-gray-50 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Hardware & Automobiles
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar2"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li aria-labelledby="dropdownNavbar2Link">
                                    <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                                        data-dropdown-placement="right-start" type="button"
                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dropdown<svg
                                            class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg></button>
                                    <div id="doubleDropdown"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="doubleDropdownButton">
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Overview</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">My
                                                    downloads</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Billing</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Rewards</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink3" data-dropdown-toggle="dropdownNavbar3"
                            class="flex items-center justify-between text-sm font-normal w-full py-2 px-3 text-gray-300 hover:text-gray-50 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Real Estates
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar3"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li aria-labelledby="dropdownNavbarLink3">
                                    <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown"
                                        data-dropdown-placement="right-start" type="button"
                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dropdown<svg
                                            class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg></button>
                                    <div id="doubleDropdown"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="doubleDropdownButton">
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Overview</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">My
                                                    downloads</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Billing</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Rewards</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink4" data-dropdown-toggle="dropdownNavbar4"
                            class="flex items-center justify-between text-sm font-normal w-full py-2 px-3 text-gray-300 hover:text-gray-50 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                            Equipments & Machinery
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar4"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li aria-labelledby="dropdownNavbarLink4">
                                    <button id="doubleDropdownButton4" data-dropdown-toggle="doubleDropdown4"
                                        data-dropdown-placement="right-start" type="button"
                                        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dropdown<svg
                                            class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                        </svg></button>
                                    <div id="doubleDropdown4"
                                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="doubleDropdownButton4">
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Overview</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">My
                                                    downloads</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Billing</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Rewards</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>

    </nav>
    <!-- drawer component -->
    <div id="drawer-nav"
        class="fixed top-0 left-0 h-screen overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800 z-[10000]"
        tabindex="-1" aria-labelledby="drawer-label">
        <div class="flex items-center border-b bg-gray-50  py-4 pl-4 pr-8">
            <div class="flex space-x-4 items-center">
                <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse h-12">
                    <div class="text-4xl">🇹🇿</div>
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-full">
                </a>
            </div>
            <button type="button" data-drawer-hide="drawer-nav" aria-controls="drawer-nav"
                class="text-gray-400 pr-4 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
        </div>
        <div class="w-full md:block relative">
            <ul
                class="font-medium bg-black block w-full p-4 mt-4 border border-inherit rounded-lg md:border-0 md:bg-inherit dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @foreach ($menus as $menu)
                    <li class="py-2 w-full">
                        <button id="{{ $menu->slug }}Link" data-dropdown-toggle="new-{{ $menu->slug }}"
                            data-dropdown-placement="right"
                            class="flex items-center justify-between text-sm w-full py-2 px-3 text-gray-300 hover:text-gray-50 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                            :class="{ '!text-gray-700 font-bold': !atTop }">
                            <div class="">{{ $menu->name }}</div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ms-2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @foreach ($menus as $menu)
        <!-- Dropdown menu -->
        <div id="new-{{ $menu->slug }}"
            class="border-l border-gray-200 z-[10000] h-screen hidden font-normal bg-white divide-y divide-gray-100 rounded-b-md shadow w-screen dark:bg-gray-700 dark:divide-gray-600">
            <div class="flex md:mx-20 px-20 sm:py-1 md:py-3 md:px-0 ">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200 md:grid md:grid-flow-col justify-start"
                    aria-labelledby="dropdownLargeButton">
                    @foreach ($menu->categories as $category)
                        <li class="px-4">
                            <a href="{{ route('public_items', $category->slug) }}"
                                class="block py-2 font-bold hover:text-sky-900 dark:hover:bg-gray-600 dark:hover:text-white">{{ $category->name }}</a>
                            <ul>
                                @foreach ($category->sub_categories as $sub_category)
                                    <li>
                                        <a href="{{ route('public_items', $sub_category->slug) }}"
                                            class="block py-1 hover:text-sky-800">{{ $sub_category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    @endforeach
</div>
