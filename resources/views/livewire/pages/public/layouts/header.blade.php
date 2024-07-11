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
                    <a href="" title="My wish list" class="hover:text-teal-500">
                        
                        <div class="relative hover:bg-gray-200 rounded-full cursor-pointer">
                            <div
                                class="absolute -top-4 -right-2 bg-red-500 text-white border-gray-100 border-2 shadow-2xl ring-0 rounded-full px-1.5 text-sm">
                                {{ $wishCount }}</div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                        </div>
                    </a>
                    <div class="relative hover:bg-gray-200 rounded-full cursor-pointer">
                        <div
                            class="absolute -top-3 -right-2 bg-gray-50 border-gray-100 border-2 shadow-2xl ring-0 rounded-full px-1.5 text-sm">
                            {{ $cartCount }}</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8 px-1.5 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex justify-start md:space-x-5 md:w-2/3 items-center p-2.5 md:p-0 md:float-left">
                <a href="/" class="h-14 hidden md:flex items-center">
                    <div class="text-4xl">🇹🇿</div>
                    <img src="{{ asset('assets/images/logo.png') }}" class="h-full">
                </a>

                <div class="flex w-full md:w-1/2">
                    <div class="relative w-full">
                        <input type="text" id="search"
                            class="block p-2 w-full z-20 text-sm text-gray-900 bg-green-50 focus:bg-gray-100 rounded-xl border-transparent focus:ring-0 focus:border-transparent"
                            placeholder="Search Mockups, Logos, Design Templates..." required />
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
        :class="{ 'fixed top-0 left-0 right-0 z-50 shadow-xl !bg-gray-100 border-b-8 border-gray-100': !atTop }">
        @include('livewire/pages/public/layouts/navbar', [
            'menus' => $menus,
        ])

    </div>

    <div class="fixed top-1/4 right-2" :class="{ 'hidden': atTop }">
        <div class="relative hover:bg-gray-200 rounded-full cursor-pointer bg-gray-100 shadow-lg">
            <div
                class="absolute -top-3 -right-2 bg-gray-50 border-gray-100 border-2 shadow-2xl ring-0 rounded-full px-1.5 text-sm">
                {{ $cartCount }}</div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-10 h-10 px-1.5 text-sky-900">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
        </div>
        <a href="" title="My wish list" class="mt-5 text-gray-700 hover:text-teal-500 flex justify-center hover:bg-gray-200 rounded-full bg-gray-100 shadow-lg">
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
