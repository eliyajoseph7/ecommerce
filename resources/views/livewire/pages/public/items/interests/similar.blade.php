<div class="relative">
    <style>
        @media (min-width: 1024px) {
            .lg\:grid-cols-5 {
                grid-template-columns: repeat(5, minmax(0, 1fr)) !important;
            }
        }
    </style>
    @if ($loading)
        <div class="absolute top-1/2 right-1/2 z-50">
            <div class="w-20 h-20 bg-black/50 flex justify-center items-center rounded-md text-gray-200">
                <i class="fa fa-spinner fa-spin text-4xl"></i>
            </div>
        </div>
    @else
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-0">
            @forelse ($similar as $new)
                <div x-data="{ activeTab: 0, autoChange: true }" title="{{ $new->name }}"
                    class="relative border-[1px] border-b-white hover:border-b-gray-300 z-30 hover:z-40 hover:p-3 hover:rounded-sm hover:scale-110 hover:border-0 hover:shadow-md bg-white px-2 py-3.5 mb-0 cursor-pointer"
                    x-init="setInterval(() => { if (autoChange && {{ count($new->images) }}) { activeTab = (activeTab + 1) % {{ count($new->images) }}; } }, 5000)" @mouseover="autoChange = false" @mouseleave="autoChange = true">
                    <div class="h-32 md:h-72 relative">
                        <!-- Images -->
                        <a  wire:click="$dispatch('count_visit', {itemId: {{ $new->id }}, routeName: 'public_items', routeArg: '{{ $new->slug }}' })">
                            <div class="relative h-full w-full">
                                @foreach ($new->images as $index => $image)
                                    <img x-show="activeTab === {{ $index }}" src="{{ asset($image->image) }}"
                                        class="absolute inset-0 h-full w-full rounded-lg object-cover ease-in-out duration-1000"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 scale-98"
                                        x-transition:enter-end="opacity-100 scale-100">
                                @endforeach
                            </div>
                        </a>

                        <!-- Tabs for Images (Only show if more than one image) -->
                        @if (count($new->images) > 1)
                            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                @foreach ($new->images as $index => $image)
                                    <button @mouseover="activeTab = {{ $index }}"
                                        :class="{
                                            'bg-teal-500 text-white': activeTab ===
                                                {{ $index }},
                                            'bg-gray-400/50': activeTab !== {{ $index }}
                                        }"
                                        class="border border-transparent rounded-full w-2 h-2 hover:bg-sky-900 hover:text-white transition duration-300 ease-in-out">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="py-4">
                        <div class="">
                            <a  wire:click="$dispatch('count_visit', {itemId: {{ $new->id }}, routeName: 'public_items', routeArg: '{{ $new->slug }}' })">{{ $new->name }}</a>
                            <div class="h-10 py-1 text-gray-500 text-sm">
                                {{ Str::length($new->short_description) > 50 ? Str::limit($new->short_description, 50, '...') : $new->short_description }}
                            </div>
                        </div>
                    </div>
                    <div class="md:flex justify-between pb-2">
                        <div class="font-bold text-gray-600 leading-10">TSh. {{ number_format($new->price, 2) }}</div>
                        <button wire:click="$dispatch('add_item', {itemId: {{ $new->id }}})"
                            class="rounded-md px-2 py-0 bg-teal-100/50 rin g-2 ring-teal-700 hover:ring-teal-600 hover:bg-teal-600 hover:shadow-sm text-teal-700 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            @empty
                <p>No items found</p>
            @endforelse
        </div>

    @endif
    <div class="text-center py-2">
        <button
            class="ring-1 ring-offset-1 ring-green-700 hover:ring-green-600 rounded-xl px-5 py-1.5 text-green-700">Load
            More</button>
    </div>
</div>
