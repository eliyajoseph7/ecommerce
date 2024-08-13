<div class="w-full">
    <div class="w-full px-2 md:px-32 lg:px-72">
        <div class="pt-4 font-black text-2xl text-gray-700">
            My Wish List
        </div>
        <div class="text-gray-400 py-2 flex space-x-1 border-b border-gray-300/70">
            <a class="pr-1 hover:text-teal-700" href="{{ route('home') }}">Home</a>/
            <p>Wish List</p>
        </div>
        <div class="py-4">
            <div class="grid sm:grid-cols-1 md:grid-cols-12 gap-1">

                <div class="bg-red-50/10 col-span-full">
                    @if (count($data) > 0)
                        <div class="flex justify-end mb-2">
                            <button wire:click="$dispatch('clear_wish_list')"
                                class="bg-gray-200/50 text-gray-500 hover:text-gray-800 px-3 py-1 rounded-md">Clear
                                List</button>
                        </div>
                    @endif
                    <div class="col-span-full grid grid-cols-4 gap-0">
                        @forelse ($data ?? [] as $dt)
                            <div x-data="{ activeTab: 0, autoChange: true }" title="{{ $dt->item->name }}"
                                class="relative border-[1px] border-b-white hover:border-b-gray-300 px-2 py-3.5 mb-0 cursor-pointer"
                                x-init="setInterval(() => { if (autoChange && {{ count($dt->item->images) }}) { activeTab = (activeTab + 1) % {{ count($dt->item->images) }}; } }, 5000)" @mouseover="autoChange = false" @mouseleave="autoChange = true">
                                <div class="h-32 md:h-72 relative">
                                    <div class="absolute top-2 right-2 z-40">
                                        <div class="bg-gray-200/50 rounded-md px-1.5 py-1 text-red-500 hover:text-red-400" title="Remove" wire:click="$dispatch('remove_wish_item', {wishListId: {{ $dt->id }}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>

                                        </div>
                                    </div>
                                    <!-- Images -->
                                    <a
                                        wire:click="$dispatch('count_visit', {itemId: {{ $dt->item->id }}, routeName: 'public_items', routeArg: '{{ $dt->item->slug }}' })">
                                        <div class="relative h-full w-full z-30">
                                            @foreach ($dt->item->images as $index => $image)
                                                <img x-show="activeTab === {{ $index }}"
                                                    src="{{ asset($image->image) }}"
                                                    class="absolute inset-0 h-full w-full rounded-lg object-cover ease-in-out duration-1000"
                                                    x-transition:enter="transition ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 scale-98"
                                                    x-transition:enter-end="opacity-100 scale-100">
                                            @endforeach
                                        </div>
                                    </a>

                                    <!-- Tabs for Images (Only show if more than one image) -->
                                    @if (count($dt->item->images) > 1)
                                        <div
                                            class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                            @foreach ($dt->item->images ?? [] as $index => $image)
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
                                        <a
                                            wire:click="$dispatch('count_visit', {itemId: {{ $dt->item->id }}, routeName: 'public_items', routeArg: '{{ $dt->item->slug }}' })">{{ $dt->item->name }}</a>
                                        <div class="h-10 py-1 text-gray-500 text-sm">
                                            {{ Str::length($dt->item->short_description) > 50 ? Str::limit($dt->item->short_description, 50, '...') : $dt->item->short_description }}
                                        </div>
                                    </div>
                                </div>
                                <div class="md:flex justify-between pb-2">
                                    <div class="font-bold text-gray-600 leading-10">TSh.
                                        {{ number_format($dt->item->price, 2) }}</div>
                                    <button wire:click="$dispatch('add_item', {itemId: {{ $dt->item->id }}})"
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
                            @for ($i = 0; $i < 4; $i++)
                                <div role="status"
                                    class="max-w-sm p-0 border border-gray-200 rounded  md:p-0 dark:border-gray-700">
                                    <div
                                        class="flex items-center text-gray-400 justify-center h-48 mb-0 bg-gray-200/50 rounded dark:bg-gray-700">
                                        Empty
                                    </div>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            @endfor
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
