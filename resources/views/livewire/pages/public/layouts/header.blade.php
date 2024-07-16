<div class="">
    <div class="h-28 sm:px-2 md:px-32 lg:px-72 items-center"
        @scroll.window="atTop = (window.pageYOffset > 100) ? false : true">
        <div class="md:py-10 flex-col-reverse md:flex-row justify-between items-center">
            <div
                class="flex space-x-8 items-center md:float-right w-full md:w-auto pt-5 md:-mt-2.5 justify-between px-2.5 md:px-0 border-b-2 md:border-0">
                <div>
                    <button id="dropdownPhoneLink" data-dropdown-toggle="dropdownPhone"
                        class="flex items-center justify-between w-full py-2 px-3 text-gray-400 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-600 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 3.75v4.5m0-4.5h-4.5m4.5 0-6 6m3 12c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
                        </svg>
                        +255684179041
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownPhone"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
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
                </div>
                <div class="flex space-x-3 items-center">
                    <a href="{{ route('wish_list') }}" title="My wish list" class="hover:text-teal-500">

                        <div class="relative hover:bg-gray-200 rounded-full cursor-pointer">
                            <div
                                class="absolute -top-4 -right-2 bg-red-500 text-white border-gray-100 border-2 shadow-2xl ring-0 rounded-full px-1.5 text-sm">
                                {{ $wishCount }}</div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </div>
                    </a>
                    <a href="{{ route('cart') }}" class="relative hover:bg-gray-200 rounded-full cursor-pointer">
                        <div
                            class="absolute -top-3 -right-2 w-6 h-6 text-center {{ $cartCount > 0 ? 'bg-red-600 animate-bounce text-white' : 'bg-gray-50' }} border-gray-100 border-2 shadow-2xl ring-0 rounded-full px-0.5 py-0 text-sm">
                            {{ $cartCount }}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-10 h-10 px-1.5 text-sky-900">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex justify-start lg:space-x-5 lg:w-2/3 items-center p-2.5 lg:p-0 lg:float-left">
                <button id="triggerDrawer"
                    class="text-gray-700 font-medium rounded-full hidden md:block lg:hidden mr-1 px-2.5 py-2.5 ring ring-gray-300/50"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <a href="/" class="h-14 hidden md:flex items-center">
                    <div class="text-4xl">🇹🇿</div>
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-full">
                </a>

                <div class="hidden lg:flex w-full lg:w-1/2">
                    <div class="relative w-full">
                        <input type="text" id="search"
                            class="block p-2 w-full z-20 text-sm text-gray-900 bg-green-50 focus:bg-gray-100 rounded-xl border-transparent focus:ring-0 focus:border-transparent"
                            placeholder="Search product items..." required />
                        <div
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-gray-400 bg-transparent rounded-lg border border-transparent">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="hidden">
        @livewire('pages.public.cart.cart-items', [
            'loadData' => false,
        ])
        @livewire('pages.public.wish.wish-lists', [
            'loadData' => false,
        ])
    </div>
    <div class="bg-sky-900"
        :class="{ 'fixed top-0 left-0 right-0 z-50 shadow-xl md:bg-gray-100 border-b-8 border-gray-100': !atTop }">
        @include('livewire/pages/public/layouts/navbar', [
            'menus' => $menus,
        ])

    </div>

    <div class="fixed top-1/4 right-2 z-50" :class="{ 'hidden': atTop }">
        <a href="{{ route('cart') }}"
            class="mt-5 flex justify-center hover:bg-gray-200 rounded-full bg-gray-100 shadow-sm">
            <div class="relative hover:bg-gray-200 rounded-full cursor-pointer">
                <div
                    class="absolute -top-3 -right-2 w-6 h-6 text-center {{ $cartCount > 0 ? 'bg-red-600 animate-bounce text-white' : 'bg-gray-50' }} border-gray-100 border-2 shadow-2xl ring-0 rounded-full px-0.5 py-0 text-sm">
                    {{ $cartCount }}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-10 h-10 px-1.5 text-sky-900">
                    <path
                        d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                </svg>
            </div>
        </a>
        <a href="{{ route('wish_list') }}" title="My wish list"
            class="mt-5 text-gray-700 hover:text-teal-500 flex justify-center hover:bg-gray-200 rounded-full bg-gray-100 shadow-sm">
            <div class="relative hover:bg-gray-200 rounded-full cursor-pointer">
                <div
                    class="absolute -top-4 -right-2 bg-red-500 text-white border-gray-100 border-2 shadow-2xl ring-0 rounded-full px-1.5 text-sm">
                    {{ $wishCount }}</div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
            </div>
        </a>
    </div>
</div>
