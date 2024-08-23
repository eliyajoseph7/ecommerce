<div class="sm:px-2 lg:px-72 py-5">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
        <div class="bg-gra y-200 rounded-full p-2">
            <img src="{{ asset('assets/images/special-offer.jpg') }}" class="min-h-40">
        </div>
        <div class="col-span-3">
            <div class="relative w-full">
                <!-- Left Arrow -->
                <button id="scroll-left"
                    class="absolute -left-3 top-1/2 transform -translate-y-1/2 rounded-full bg-gray-100/80 text-sky-800 p-2 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                    </svg>
                </button>

                <!-- Scrollable Container -->
                <div id="scroll-container" class="flex space-x-4 overflow-x-scroll no-scrollbar items-center">
                    @forelse (isset($offers) ? $offers : [] as $offer)
                        <div class="w-[70%] md:w-72 min-h-48 bg-gray-50 rounded-md flex-shrink-0">
                            <div class="relative w-full">
                                <a
                                    wire:click="$dispatch('count_visit', {itemId: {{ $offer->id }}, routeName: 'public_items', routeArg: '{{ $offer->slug }}' })" class="cursor-pointer h-[10vh]">
                                    <img src="{{ asset($offer->images?->first()->image) }}"
                                        class="inset-0 h-[20vh] lg:h-[24vh] w-full rounded-b-lg object-cover"
                                        onerror="this.onerror=null;this.src='{{ asset('assets/images/placeholder-product.png') }}';">
                                </a>
                                <div
                                    class="absolute top-2 right-2 font-bold bg-red-500 rounded-md text-gray-100 px-2 py-0.5">
                                    {{ round($offer->discount->percentage) }}% Off
                                </div>
                                <div class="py-4 px-2">
                                    {{-- <div class="">
                                        <a
                                            wire:click="$dispatch('count_visit', {itemId: {{ $offer->id }}, routeName: 'public_items', routeArg: '{{ $offer->slug }}' })">{{ $offer->name }}</a>
                                        <div class="h-10 py-1 text-gray-500 text-sm">
                                            {{ Str::length($offer->short_description) > 50 ? Str::limit($offer->short_description, 50, '...') : $offer->short_description }}
                                        </div>
                                        
                                    </div> --}}
                                    <div class="flex justify-between">
                                        <div>
                                            TSh. <span class="line-through">{{ number_format($offer->price, 2) }}</span>
                                        </div>
                                        <div class="text-gray-500 bg-gray-50 text-sm">{{ $offer->discount->days_remain }}</div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between px-2 pb-2">
                                    <div class="font-bold text-gray-600 leading-10">TSh. {{ number_format($offer->amount, 2) }}</div>
                                    <button wire:click="$dispatch('add_item', {itemId: {{ $offer->id }}})"
                                        class="rounded-md px-2 py-0 bg-teal-100/50 rin g-2 ring-teal-700 hover:ring-teal-600 hover:bg-teal-600 hover:shadow-sm text-teal-700 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full h-[20vh] items-center flex">
                            <div class="">
                                <div class="text-2xl font-bold text-gray-300 leading-loose">Offers will be released
                                    soon. Stay up-to-date</div>

                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Right Arrow -->
                <button id="scroll-right"
                    class="absolute -right-3 top-1/2 transform -translate-y-1/2 rounded-full bg-gray-100/80 text-sky-800 p-2 z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
