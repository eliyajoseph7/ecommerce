<div>
    <div class="relative">
        <x-slot name="header">
            @include('includes.breadcrumb', [
                'main' => 'Order Management',
                'menu' => 'View Order',
            ])
        </x-slot>
        <div class="absolute -top-10 right-2 z-40">
            <a href="{{ route('order_list') }}" class="text-red-500 hover:text-red-700" title="Close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>
    </div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-0">
        <div class="w-full pt-3 md:px-4 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="">

                    <div class="bg-gray-50/50 shadow-sm p-2 rounded-md my-1">
                        <div class="flex justify-between">
                            <div class="text-gray-700 font-bold text-lg">Order Details</div>
                            <div class="flex px-2 py-0 5 rounded-md font-bold"><span
                                    class="text-gray-700 mr-1 bg-transparent">Order Status:</span>{!! $order->order_status !!}
                            </div>
                        </div>
                        <div class="">
                            <!-- Grid -->
                            <div class="flex justify-between mt-4 border-t border-gray-200">
                                <div>
                                    <img src="{{ asset('assets/images/logo.png') }}" class="w-14">

                                    <h1 class="mt-2 text-lg md:text-xl font-semibold text-blue-600 dark:text-white">

                                    </h1>
                                </div>
                                <!-- Col -->

                                <div class="text-end flex space-x-2 items-center">
                                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200">
                                        Order #
                                    </h2>
                                    <span
                                        class="mt-1 block bg-sky-50 text-sky-900 dark:text-neutral-500">{{ $order?->orderno }}</span>
                                </div>
                                <!-- Col -->
                            </div>
                            <!-- End Grid -->

                            <!-- Grid -->
                            <div class="mt-8 grid sm:grid-cols-2 gap-3">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Bill to:</h3>
                                    <h3 class="text-md font-semibold text-gray-800 dark:text-neutral-200">
                                        {{ $order?->customer->full_name }}
                                    </h3>
                                    {{-- <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
                                        {{ $order?->customer->phone }}<br>
                                        TIN Number: {{ $order?->customer->tin }}<br>
                                    </address> --}}
                                </div>
                                <!-- Col -->

                                <div class="sm:text-end space-y-2">
                                    <!-- Grid -->
                                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                        <dl class="grid sm:grid-cols-5 gap-x-3">
                                            <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                                Order date:
                                            </dt>
                                            <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                                {{ $order?->order_date?->format('d/m/Y') }}
                                            </dd>
                                        </dl>
                                        <dl class="grid sm:grid-cols-5 gap-x-3">
                                            <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                                Pay Mode:
                                            </dt>
                                            <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                                {{ $order?->payment_method }}
                                            </dd>
                                        </dl>
                                        <dl class="grid sm:grid-cols-5 gap-x-3">
                                            <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                                Payment Status:
                                            </dt>
                                            <dd class="col-span-2 text-gray-500 dark:text-neutral-500">
                                                <span
                                                    class="">{!! $order?->order_payment !!}</span>
                                            </dd>
                                        </dl>
                                    </div>
                                    <!-- End Grid -->
                                </div>
                                <!-- Col -->
                            </div>
                            <!-- End Grid -->

                            <!-- Table -->
                            <div class="mt-6">
                                <div class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-neutral-700">
                                    <div class="hidden sm:grid sm:grid-cols-5">
                                        <div
                                            class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                            Item</div>
                                        <div
                                            class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                            Qty</div>
                                        <div
                                            class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                            Price</div>
                                        <div
                                            class="text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                            Amount (Tsh.)</div>
                                    </div>

                                    <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>

                                    @foreach ($order->orderItems as $dt)
                                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2 items-center">
                                            <div class="col-span-full sm:col-span-2">
                                                <h5
                                                    class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                    Item</h5>
                                                <p
                                                    class="font-medium text-gray-800 dark:text-neutral-200 flex items-center">
                                                    <img src="{{ asset($dt->item->images()?->first()?->image) }}"
                                                        class="w-10 h-10 object-cover rounded-md mr-1">{{ $dt->item?->name }}
                                                </p>
                                            </div>
                                            <div>
                                                <h5
                                                    class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                    Qty</h5>
                                                <p class="text-gray-800 dark:text-neutral-200">{{ $dt->quantity }}</p>
                                            </div>
                                            <div>
                                                <h5
                                                    class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                    Price</h5>
                                                <p class="text-gray-800 dark:text-neutral-200">
                                                    {{ number_format($dt->price, 2) }}</p>
                                            </div>
                                            <div>
                                                <h5
                                                    class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                                    Amount (Tsh.)</h5>
                                                <p class="sm:text-end text-gray-800 dark:text-neutral-200">
                                                    {{ number_format($dt->total_price, 2) }}</p>
                                            </div>
                                        </div>
                                        <div class="sm:hidden border-b border-gray-200 dark:border-neutral-700"></div>
                                    @endforeach

                                </div>
                            </div>
                            <!-- End Table -->

                            <!-- Flex -->
                            <div class="mt-8 flex sm:justify-end">
                                <div class="w-full max-w-2xl sm:text-end space-y-2">
                                    <!-- Grid -->
                                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                        <dl class="grid sm:grid-cols-5 gap-x-3">
                                            <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                                VAT:</dt>
                                            <dd class="col-span-2 text-gray-500 dark:text-neutral-500">Tsh.
                                                {{ number_format($vatAmount, 2) }}</dd>
                                        </dl>

                                        <dl class="grid sm:grid-cols-5 gap-x-3">
                                            <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">
                                                Total:</dt>
                                            <dd class="col-span-2 text-gray-500 dark:text-neutral-500">Tsh.
                                                {{ number_format($totalAmount, 2) }}</dd>
                                        </dl>

                                    </div>
                                    <!-- End Grid -->
                                </div>
                            </div>
                            <!-- End Flex -->
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-gray-50/50 shadow-sm p-2 rounded-md my-2">
                        <div class="text-gray-700 font-bold py-1 text-lg">Customer Details</div>
                        <div class="border-t border-gray-100">
                            <div class="grid grid-cols-1  gap-4">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">First Name</div>
                                    <div class="col-span-2">{{ $order->customer->first_name }}</div>
                                    <div class="text-gray-700">Last Name</div>
                                    <div class="col-span-2">{{ $order->customer->last_name }}</div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">Phone</div>
                                    <div class="col-span-2">{{ $order->customer->phone }}</div>
                                    <div class="text-gray-700">Email</div>
                                    <div class="col-span-2">{{ $order->customer->email }}</div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">Company</div>
                                    <div class="col-span-2">{{ $order->customer->company }}</div>
                                    <div class="text-gray-700">TIN</div>
                                    <div class="col-span-2">{{ $order->customer->tin }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50/50 shadow-sm p-2 rounded-md my-2">
                        <div class="text-gray-700 font-bold py-1 text-lg">Delivery Details</div>
                        <div class="border-t border-gray-100">
                            <div class="grid grid-cols-1  gap-4">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">Country:</div>
                                    <div class="col-span-2">{{ $order->deliveryAddress->country?->name }}</div>
                                    <div class="text-gray-700">Region:</div>
                                    <div class="col-span-2">{{ $order->deliveryAddress->region?->name }}</div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">District:</div>
                                    <div class="col-span-2">{{ $order->deliveryAddress->district?->name }}</div>
                                    <div class="text-gray-700">Ward:</div>
                                    <div class="col-span-2">{{ $order->deliveryAddress->ward?->name }}</div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">Village/Street</div>
                                    <div class="col-span-2">{{ $order->deliveryAddress->village?->name }}</div>
                                    <div class="text-gray-700">Address</div>
                                    <div class="col-span-2">{{ $order->deliveryAddress->address }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50/50 shadow-sm p-2 rounded-md my-2">
                        <div class="text-gray-700 font-bold py-1 text-lg">Billing Details</div>
                        <div class="border-t border-gray-100">
                            <div class="grid grid-cols-1  gap-4">
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">Country:</div>
                                    <div class="col-span-2">{{ $order->billingAddress->country?->name }}</div>
                                    <div class="text-gray-700">Region:</div>
                                    <div class="col-span-2">{{ $order->billingAddress->region?->name }}</div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">District:</div>
                                    <div class="col-span-2">{{ $order->billingAddress->district?->name }}</div>
                                    <div class="text-gray-700">Ward:</div>
                                    <div class="col-span-2">{{ $order->billingAddress->ward?->name }}</div>
                                </div>
                                <div class="grid grid-cols-3 gap-2">
                                    <div class="text-gray-700">Village/Street:</div>
                                    <div class="col-span-2">{{ $order->billingAddress->village?->name }}</div>
                                    <div class="text-gray-700">Address:</div>
                                    <div class="col-span-2">{{ $order->billingAddress->address }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
