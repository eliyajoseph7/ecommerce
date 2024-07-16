<div class="w-full">
    <style>
        .focus\:outline-none:focus {
            outline: 0px solid transparent !important;
            outline-offset: 0px !important;
        }
    </style>
    <div class="w-full px-2 md:px-32 lg:px-72">
        <div class="pt-4 font-black text-2xl text-gray-700">
            My Cart Items
        </div>
        <div class="text-gray-400 py-2 flex space-x-1 border-b border-gray-300/70">
            <a class="pr-1 hover:text-teal-700" href="{{ route('home') }}">Home</a>/
            <p>Cart Items</p>
        </div>
        <div class="py-4 w-full overflow-x-auto">
            <div class="grid sm:grid-cols-1 md:grid-cols-12 gap-1">

                <div class="bg-red-50/10 col-span-full">
                    @if (count($data ?? []) > 0)
                        <div class="flex justify-end mb-2">
                            <button wire:click="$dispatch('clear_cart')"
                                class="bg-gray-200/50 text-gray-500 hover:text-gray-800 px-3 py-1 rounded-md">Clear
                                List</button>
                        </div>
                    @endif
                    <div class="col-span-full grid sm:grid-cols-2 lg:grid-cols-10 gap-4">
                        <div class="font-bold hidden lg:flex">Product</div>
                        <div class="lg:col-span-5 hidden lg:flex"></div>
                        <div class="font-bold hidden lg:flex">Unit Price</div>
                        <div class=" font-bold hidden lg:flex">Quantity</div>
                        <div class="font-bold hidden lg:flex">Total Price</div>
                        <div class="hidden lg:flex"></div>
                    </div>
                    @forelse ($data ?? [] as $dt)
                        <div class="col-span-full grid grid-cols-2 lg:grid-cols-10 gap-4 my-5 bg-gray-100/50 p-1 rounded-md">
                            <div class="">
                                <div class="font-bold lg:hidden">Product</div>
                                <a class="cursor-pointer rounded-md"
                                    wire:click="$dispatch('count_visit', {itemId: {{ $dt->item->id }}, routeName: 'public_items', routeArg: '{{ $dt->item->slug }}' })">
                                    <img src="{{ asset($dt->item->images?->first()?->image) }}"
                                        class="w-full h-28 lg:h-auto object-cover rounded-md px-2">
                                </a>
                            </div>
                            <div class="lg:col-span-5">
                                <div class="text-teal-500 cursor-pointer hover:underline"
                                    wire:click="$dispatch('count_visit', {itemId: {{ $dt->item->id }}, routeName: 'public_items', routeArg: '{{ $dt->item->slug }}' })">
                                    {{ $dt->item->name }}</div>
                                <div class="text-sm">
                                    {{ Str::length($dt->item->short_description) > 50 ? Str::limit($dt->item->short_description, 50, '...') : $dt->item->short_description }}
                                </div>
                            </div>
                            <div class="">
                                <div class="mt-1 font-bold lg:hidden">Unit Price</div>
                                <div class="lg:text-right">{{ number_format($dt->item->price) }}</div>
                            </div>
                            <div class="">
                                <div class="mt-1 font-bold lg:hidden">Quantity</div>
                                <div class="flex justify-center">
                                    <div class="flex space-x-2 bg-gray-200/50 px-2 text-gray-600 rounded-md py-0.5">
                                        <button class="text-md hover:text-teal-700" wire:click="decrementQuantity">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd"
                                                    d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <input type="text" value="{{ $dt->quantity }}" id=""
                                            class="w-14 p-0 border-0 focus:outline-none focus:ring-0 focus:shadow-none bg-transparent text-gray-600 text-center  rounded-md">
                                        <button class="text-md hover:text-teal-700" wire:click="incrementQuantity">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4">
                                                <path fill-rule="evenodd"
                                                    d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="mt-1 font-bold lg:hidden">Total Price</div>
                                <div class="lg:text-right">{{ number_format($dt->cost) }}</div>
                            </div>
                            <div class="flex justify-center">
                                <div class="w-8 h-8 bg-gray-200/50 hover:bg-red-200/50 cursor-pointer rounded-md px-1.5 py-1 hover:text-red-500 text-gray-400"
                                    title="Remove"
                                    wire:click="$dispatch('remove_cart_item', {cartId: {{ $dt->id }}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-gray-300/30 rounded-md text-gray-600 p-3 col-span-full">There is nothing in
                            the cart</div>
                        <div role="status"
                            class="col-span-full space-y-8 md:space-y-0 md:space-x-8 rtl:space-x-reverse md:flex md:items-center">
                            <div
                                class="flex items-center justify-center h-28 bg-gray-200/50 text-gray-500 rounded w-48 dark:bg-gray-700">
                                Empty
                            </div>
                            <div class="w-full">
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[480px] mb-2.5">
                                </div>
                                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
                                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[440px] mb-2.5">
                                </div>
                                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[460px] mb-2.5">
                                </div>
                                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
                            </div>
                            <span class="sr-only">Loading...</span>
                        </div>
                    @endforelse
                    <div class="border border-gray-200 rounded-lg p-3 mx-2 my-4">
                        <div class="flex justify-end border-b">
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-gray-400">Subtotal</div>
                                <div class="col-span-2 text-right px-2 text-gray-400">Tsh.
                                    {{ number_format($data->sum('cost')) }}</div>
                                <div class="text-gray-400">Delivery Cost</div>
                                <div class="col-span-2 text-right px-2 text-gray-400">Tsh. 0</div>
                            </div>
                        </div>
                        <div class="block mt-2 md:flex justify-between items-center">
                            <a href="{{ route('home') }}"
                                class="bg-teal-600 hover:bg-teal-500 text-gray-100 rounded-md px-2 py-1">
                                Continue shopping
                            </a>
                            <div class="grid grid-cols-3 gap-4 py-4">
                                <div class="text-gray-400 text-xl font-bold">Total Cost</div>
                                <div class="col-span-2 text-right px-2 text-gray-700 font-bold">Tsh.
                                    {{ number_format($data->sum('cost')) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
