<div>
    @if ($loading)
        Loading
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-0">
            @forelse ($newest as $new)
                <div x-data="{ activeTab: 0, autoChange: true }"
                    class="relative border-[1px] border-b-white hover:border-b-gray-300 px-2 py-3.5 mb-4 cursor-pointer"
                    x-init="setInterval(() => { if (autoChange && {{ count($new->images) }}) { activeTab = (activeTab + 1) % {{ count($new->images) }}; } }, 5000)" @mouseover="autoChange = false" @mouseleave="autoChange = true">
                    <div class="h-72 relative">
                        <!-- Images -->
                        <div class="relative h-full w-full">
                            @foreach ($new->images as $index => $image)
                                <img x-show="activeTab === {{ $index }}" src="{{ asset($image->image) }}"
                                    class="absolute inset-0 h-full w-full rounded-lg object-cover ease-in-out duration-1000"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-98"
                                    x-transition:enter-end="opacity-100 scale-100">
                            @endforeach
                        </div>

                        <!-- Tabs for Images (Only show if more than one image) -->
                        @if (count($new->images) > 1)
                            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                @foreach ($new->images as $index => $image)
                                    <button @mouseover="activeTab = {{ $index }}"
                                        :class="{ 'bg-sky-700 text-white': activeTab ===
                                            {{ $index }}, 'bg-white': activeTab !== {{ $index }} }"
                                        class="border border-transparent rounded-full w-4 h-4 hover:bg-sky-900 hover:text-white transition duration-300 ease-in-out">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="py-4">{{ $new->name }}</div>
                    <div class="flex justify-between py-2">
                        <div class="">TSh. {{ number_format($new->price, 2) }}</div>
                        <button
                            class="rounded-md p-1 ring-2 ring-green-700 hover:ring-green-600 hover:bg-green-600 hover:shadow-sm text-green-700 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
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
    <div class="text-center">
        <button
            class="ring-1 ring-offset-1 ring-green-700 hover:ring-green-600 rounded-xl px-5 py-1.5 text-green-700">Load
            More</button>
    </div>
</div>
