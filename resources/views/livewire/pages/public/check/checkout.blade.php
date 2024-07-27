<div class="w-full z-10">
    <div class="px-2 md:px-32 lg:px-72">
        <div class="grid sm:grid-cols-1 lg:grid-cols-12 gap-2 py-4 relative">
            <div class="md:col-span-8 py-4">
                <div class="font-black text-3xl text-gray-800 py-2">Checkout</div>
                <div class="border-b">
                    <div class="px-3 py-5">
                        <div class="bg-gray-100 rounded-md px-2 py-1 flex justify-between space-x-2">
                            <div class="font-bold text-xl">My Order</div>
                            <div class="">
                                <a href="{{ route('cart') }}"
                                    class="text-teal-500 flex items-center space-x-1 hover:underline hover:text-teal-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                    <span>Edit</span>
                                </a>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-span-full grid sm:grid-cols-2 lg:grid-cols-10 gap-4 mt-2">
                                <div class="font-bold hidden lg:flex text-sm text-gray-400"></div>
                                <div class="lg:col-span-3 hidden lg:flex text-sm text-gray-400"></div>
                                <div class="lg:col-span-2 font-bold hidden lg:flex text-sm text-gray-400">Price</div>
                                <div class="lg:col-span-2 font-bold hidden lg:flex text-sm text-gray-400">Quantity</div>
                                <div class="font-bold hidden lg:flex text-sm text-gray-400">Amount</div>
                                <div class="hidden lg:flex text-sm text-gray-400"></div>
                            </div>
                            @forelse ($items ?? [] as $dt)
                                <div
                                    class="col-span-full grid grid-cols-2 lg:grid-cols-10 gap-4 my-5 bg-gray-100/50 p-1 rounded-md">
                                    <div class="">
                                        <div class="font-bold lg:hidden text-sm text-gray-400">Product</div>
                                        <a class="cursor-pointer rounded-md"
                                            wire:click="$dispatch('count_visit', {itemId: {{ $dt->item->id }}, routeName: 'public_items', routeArg: '{{ $dt->item->slug }}' })">
                                            <img src="{{ asset($dt->item->images?->first()?->image) }}"
                                                class="w-full h-28 lg:h-auto object-cover rounded-md px-2">
                                        </a>
                                    </div>
                                    <div class="lg:col-span-3">
                                        <div class="text-teal-500 cursor-pointer hover:underline"
                                            wire:click="$dispatch('count_visit', {itemId: {{ $dt->item->id }}, routeName: 'public_items', routeArg: '{{ $dt->item->slug }}' })">
                                            {{ $dt->item->name }}</div>
                                        <div class="text-sm font-italic text-gray-500">
                                            {{ Str::length($dt->item->short_description) > 30 ? Str::limit($dt->item->short_description, 30, '...') : $dt->item->short_description }}
                                        </div>
                                    </div>
                                    <div class="lg:col-span-2">
                                        <div class="mt-1 font-bold lg:hidden text-sm text-gray-400">Price</div>
                                        <div class="lg:text-rig ht whitespace-nowrap text-sm">Tsh.
                                            {{ number_format($dt->item->price) }}</div>
                                    </div>
                                    <div class="lg:col-span-2 text-sm">
                                        <div class="lmt-1 font-bold lg:hidden text-sm text-gray-400">Quantity</div>
                                        <div class="flex justify-start">
                                            <div class="flex space-x-2 bg-gray-200/50 px-2 text-gray-600 rounded-md py-0.5">
                                                <button class="text-md hover:text-teal-700"
                                                    wire:click="decrementQuantity({{ $dt->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="size-3">
                                                        <path fill-rule="evenodd"
                                                            d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <input type="text" value="{{ $dt->quantity }}" id=""
                                                    class="w-8 p-0 border-0 focus:outline-none focus:ring-0 focus:shadow-none bg-transparent text-gray-600 text-center  rounded-md">
                                                <button class="text-md hover:text-teal-700"
                                                    wire:click="incrementQuantity({{ $dt->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="size-3">
                                                        <path fill-rule="evenodd"
                                                            d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="mt-1 font-bold lg:hidden text-sm text-gray-400">Amount</div>
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
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="py-8">
                    @if (!Helper::is_auth())
                        <div class="flex justify-end space-x-2 items-center">
                            <div class="text-gray-400">To automatically fill your information</div>
                            <a href="{{ route('signin') }}" class="bg-gray-800/50 px-3 py-1 rounded-md text-white hover:bg-gray-700">Signin</a>
                        </div>
                    @endif
                    @livewire('pages.public.check.components.customer-info')
                    @livewire('pages.public.check.components.delivery-info')
                    @livewire('pages.public.check.components.payment-info')
                    @livewire('pages.public.check.components.customer-note')
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="bg-gray-100 rounded-md p-8" :class="{ 'lg:fixed top-24 lg:w-[440px]': !atTop }">
                    <div class="text-2xl font-bold text-gray-700 my-2">Order Summary</div>
                    <div class="flex justify-between my-1">
                        <div class="text-gray-400">Product Quantity</div>
                        <div class="">{{ $items->sum('quantity') }} Item(s)</div>
                    </div>
                    <div class="flex justify-between my-1">
                        <div class="text-gray-400">Amount</div>
                        <div class="">Tsh. {{ number_format($items->sum('cost')) }}</div>
                    </div>
                    <div class="border-t border-b mt-3">
                        <div class="flex justify-between py-3">
                            <div class="text-gray-400">Order Total</div>
                            <div class="text-2xl font-black">Tsh. {{ number_format($items->sum('cost')) }}</div>
                        </div>
                    </div>
                    <div class="my-10">
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Agree to <a
                                    href="#" class="text-teal-600">Terms & Conditions</a></label>
                        </div>
                    </div>
                    <div class="mt-10">
                        <button wire:click="$dispatch('submit_order')"
                            class="bg-teal-600 hover:bg-teal-500 rounded-md font-bold items-center px-0 py-2 w-full flex justify-center space-x-2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                            <span class="text-xl">Place order</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
