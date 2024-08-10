<aside id="logo-sidebar"
    class="fixed top-[3.0rem] left-0 z-30 w-64 h-screen pt-4 transition-transform -translate-x-full bg-gray-50 border-r-8 border-r-sky-50/50 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-[88vh] px-3 pb-4 overflow-y-auto bg-inherit dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg dark:text-white font-normal {{ Route::is('dashboard') ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                    </svg>

                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <p class="text-sm text-gray-400 uppercase">Main</p>
    
                <li>
                    <a href="{{ route('order_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ in_array(Route::currentRouteName(), ['order_list', 'order_view']) ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>
    
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ in_array(Route::currentRouteName(), ['customer_list', 'customer_view']) ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
    
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sub_category_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ Route::is('sub_category_list') || Route::is('sub_category_form') || Route::is('sub_category_form_edit') ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Discounts</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <p class="text-sm text-gray-400">SETTINGS</p>
    
                <li>
                    <a href="{{ route('main_menu_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ in_array(Route::currentRouteName(), ['main_menu_list', 'main_menu_form', 'main_menu_form_edit']) ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>
    
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Main Menus</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ Route::is('category_list') || Route::is('category_form') || Route::is('category_form_edit') ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
    
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sub_category_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ Route::is('sub_category_list') || Route::is('sub_category_form') || Route::is('sub_category_form_edit') ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Sub-Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('item_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ in_array(Route::currentRouteName(), ['item_list', 'item_form', 'item_form_edit', 'item_view']) ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                        </svg>
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Manage Items</span>
                    </a>
                </li>
            </ul>
            <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                <p class="text-sm text-gray-400 uppercase">System</p>
    
                <li>
                    <a href="{{ route('main_menu_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ in_array(Route::currentRouteName(), ['main_menu_list', 'main_menu_form', 'main_menu_form_edit']) ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                        </svg>
    
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Roles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ Route::is('category_list') || Route::is('category_form') || Route::is('category_form_edit') ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                        </svg>
    
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Permissions</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sub_category_list') }}"
                        class="flex items-center p-2 rounded-lg dark:text-white {{ Route::is('sub_category_list') || Route::is('sub_category_form') || Route::is('sub_category_form_edit') ? 'bg-sky-100/50 text-sky-900 font-bold hover:bg-sky-100/50' : 'font-normal text-gray-700 hover:text-sky-900 hover:bg-sky-100/50' }} dark:hover:bg-gray-700 group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                        </svg>
    
                        <span class="flex-1 ms-3 whitespace-nowrap text-md">Users</span>
                    </a>
                </li>
            </ul>
        </ul>

    </div>
</aside>
