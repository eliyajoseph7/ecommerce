<div x-data="{ activeTab: 0, autoChange: true, view: false }" title="{{ $item->name }}"
    class="relative border-[1px] border-b-white hover:border-b-gray-300 px-0.5 pb-3.5 mb-0 cursor-pointer"
    x-init="setInterval(() => { if (autoChange && {{ count($item->images) }}) { activeTab = (activeTab + 1) % {{ count($item->images) }}; } }, 5000)" @mouseover="autoChange = false, view = true"
    @mouseleave="autoChange = true, view = false">
    <div class="h-32 md:h-72 relative">
        <div class="absolute top-3 right-2 z-50" x-show="view">
            <div class="text-gray-400 hover:text-teal-500" title="View item"
                wire:click="$dispatch('count_visit', {itemId: {{ $item->id }}, routeName: 'public_items', routeArg: '{{ $item->slug }}'})">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-6">
                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    <path fill-rule="evenodd"
                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div wire:click="$dispatch('wish_item', {itemId: {{ $item->id }}})"
                class="text-gray-400 hover:text-teal-500" title="Add to wishlist">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                </svg>
            </div>
        </div>
        <!-- Images -->
        <a
            wire:click="$dispatch('count_visit', {itemId: {{ $item->id }}, routeName: 'public_items', routeArg: '{{ $item->slug }}' })">
            <div class="relative h-full w-full">
                @foreach ($item->images as $index => $image)
                    <img x-show="activeTab === {{ $index }}" src="{{ asset($image->image) }}"
                        class="absolute inset-0 h-full w-full rounded-b-lg object-cover ease-in-out duration-1000"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-98"
                        x-transition:enter-end="opacity-100 scale-100">
                @endforeach
                @if ($item->discount)
                    <div
                        class="absolute top-2 right-2 font-bold bg-red-500 rounded-md text-gray-100 px-2 py-0.5">
                        {{ round($item->discount->percentage) }}% Off
                    </div>
                    <div class="flex justify-between px-2 pb-2 space-x-1 absolute bottom-2 left-0 right-0">
                        <div class="text-red-500 bg-gray-100/50 px-2 rounded-md">
                            TSh. <span class="line-through">{{ number_format($item->price, 2) }}</span>
                        </div>
                        <div class="text-gray-500 bg-gray-50 rounded-md p-1 text-sm">{{ $item->discount->days_remain }}</div>
                    </div>
                @endif
            </div>
        </a>

        <!-- Tabs for Images (Only show if more than one image) -->
        @if (count($item->images) > 1)
            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
                @foreach ($item->images as $index => $image)
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
    <div class="py-4 px-2">
        <div class="">
            <a
                wire:click="$dispatch('count_visit', {itemId: {{ $item->id }}, routeName: 'public_items', routeArg: '{{ $item->slug }}' })">{{ $item->name }}</a>
            <div class="h-10 py-1 text-gray-500 text-sm">
                {{ Str::length($item->short_description) > 50 ? Str::limit($item->short_description, 50, '...') : $item->short_description }}
            </div>
        </div>
    </div>
    @if ($item->discount)
        <div class="md:flex justify-between px-2 pb-2">
            <div class="font-bold text-gray-600 leading-10">TSh. {{ number_format($item->amount, 2) }}
            </div>
            <button wire:click="$dispatch('add_item', {itemId: {{ $item->id }}})"
                class="rounded-md px-2 py-0 bg-teal-100/50 rin g-2 ring-teal-700 hover:ring-teal-600 hover:bg-teal-600 hover:shadow-sm text-teal-700 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </button>
        </div>
    @else
        <div class="md:flex justify-between px-2 pb-2">
            <div class="font-bold text-gray-600 leading-10">TSh. {{ number_format($item->price, 2) }}
            </div>
            <button wire:click="$dispatch('add_item', {itemId: {{ $item->id }}})"
                class="rounded-md px-2 py-0 bg-teal-100/50 rin g-2 ring-teal-700 hover:ring-teal-600 hover:bg-teal-600 hover:shadow-sm text-teal-700 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </button>
        </div>
    @endif
</div>