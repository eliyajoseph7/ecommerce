<div class="w-full z-10">
    <div class="px-2 md:px-32 lg:px-72">
        <div class="grid sm:grid-cols-1 lg:grid-cols-12 gap-2 py-4 relative">
            <div class="md:col-span-8 py-4">
                <div class="font-black text-3xl text-gray-800 py-2">Orders</div>
                <div class="border-b">
                    <div class="px-3 py-5">
                        <div class="bg-gray-100 rounded-md px-2 py-1 flex justify-between space-x-2">
                            <div class="font-bold text-xl">My Order(s)</div>
                        </div>
                        <div class="bg-gray-100/20 px-4">
                            <div class="col-span-full grid sm:grid-cols-2 lg:grid-cols-7 gap-4 mt-2">
                                <div class="lg:col-span-2 font-bold hidden lg:flex text-sm text-gray-400">Order Date</div>
                                <div class="lg:col-span-2 hidden lg:flex text-sm text-gray-400">Order No.</div>
                                <div class="lg:col-span-2 font-bold hidden lg:flex text-sm text-gray-400">Order Amount</div>
                                <div class="font-bold hidden lg:flex text-sm text-gray-400">Order Status</div>
                                {{-- <div class="hidden lg:flex text-sm text-gray-400"></div> --}}
                            </div>
                            @forelse ($orders ?? [] as $order)
                                <div
                                    class="col-span-full grid grid-cols-2 lg:grid-cols-7 gap-4 my-3 bg-gray-100/50 p-2 text-gray-700 rounded-md">
                                    <div class="lg:col-span-2">
                                        <div class="font-bold lg:hidden text-sm text-gray-400">Order Date</div>
                                        <div class="">{{ $order->created_at->format('M d, Y H:i:s') }}</div>
                                    </div>
                                    <div class="lg:col-span-2">
                                        <div class="font-bold lg:hidden text-sm text-gray-400">Order No.</div>
                                        <div class="">{{ $order->orderno }}</div>
                                    </div>
                                    <div class="lg:col-span-2">
                                        <div class="font-bold lg:hidden text-sm text-gray-400">Order Amount</div>
                                        <div class="">{{ number_format($order->total_amount) }}</div>
                                    </div>
                                    <div class="">
                                        <div class="font-bold lg:hidden text-sm text-gray-400">Order Status</div>
                                        <div class="">{{ $order->status }}</div>
                                    </div>
                                    
                                    {{-- <div class="flex justify-center">
                                        <div class="w-8 h-8 bg-gray-200/50 hover:bg-red-200/50 cursor-pointer rounded-md px-1.5 py-1 hover:text-red-500 text-gray-400"
                                            title="Remove"
                                            wire:click="$dispatch('remove_cart_item', {cartId: {{ $order->id }}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-wiorderh="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                        </div>
                                    </div> --}}
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-4">
                
            </div>
        </div>

    </div>

</div>
