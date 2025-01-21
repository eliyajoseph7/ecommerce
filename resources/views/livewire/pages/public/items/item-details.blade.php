<div class="w-full">
    <style>

    </style>
    <div class="pt-4 w-full px-4 lg:px-72">
        <div class="text-gray-400 py-2 md:flex space-x-1 border-b border-gray-300/70">
            <a class="pr-1 hover:text-teal-700" href="{{ route('home') }}">Home</a>/
            <a class="pr-1 hover:text-teal-700"
                href="{{ route('public_items', $context['category']['slug']) }}">{{ $context['category']['name'] }}</a>/
            <a class="pr-1 hover:text-teal-700"
                href="{{ route('public_items', $context['sub_category']['slug']) }}">{{ $context['sub_category']['name'] }}</a>/
            <p>{{ $data->name }}</p>
        </div>
        <div class="py-3">
            <div class="">{{ $data->name }}</div>
            <div class="grid sm:grid-cols-1 md:grid-cols-12 gap-2">

                <div class="grid gap-4 md:col-span-7 lg:col-span-8">
                    <div class="relative">
                        <img class="h-[20vh] md:h-[40vh] lg:h-[60vh] w-full rounded-lg object-cover"
                            src="{{ $context['active_img'] }}" alt="">
                        @if ($data->discount)
                            <div
                                class="absolute bottom-0 right-0 font-bold bg-red-100/50 rounded-md text-red-500 px-2 py-0.5">
                               <div class="">Discount: {{ round($data->discount->percentage) }}% Off</div>
                               <div class="text-sm font-normal">{{ $data->discount->days_remain }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="w-96 lg:w-full">
                        <div class="relative w-full">
                            <!-- Left Arrow -->
                            <button id="scroll-left"
                                class="absolute -left-3 top-1/2 transform -translate-y-1/2 rounded-full bg-gray-100/80 text-sky-800 p-2 z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                                </svg>
                            </button>

                            <!-- Scrollable Container -->
                            <div id="scroll-container-2" class="flex space-x-4 overflow-x-scroll no-scrollbar">
                                @foreach ($data->images as $image)
                                    @if ($image->image != $context['active_img'])
                                        <div class="w-32 z-0">
                                            <div class="h-28 w-32 rounded-md p-2 cursor-pointer"
                                                wire:click="$dispatch('update_active_img', {image: '{{ $image->image }}'})">
                                                {{-- <img src="{{ asset($image->image) }}" class="w-full h-full object-cover rounded-md"> --}}
                                                <img class="h-full w-full rounded-lg object-cover"
                                                    src="{{ asset($image->image) }}" alt="">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <!-- Right Arrow -->
                            <button id="scroll-right"
                                class="absolute -right-3 top-1/2 transform -translate-y-1/2 rounded-full bg-gray-100/80 text-sky-800 p-2 z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="py-4" wire:ignore>
                        <div class="py-4">
                            <div class="mb-4 border-b border-gray-200 dark-remove:border-gray-700">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                                    data-tabs-toggle="#default-tab-content" role="tablist">
                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="description-tab"
                                            data-tabs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="false">Description</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark-remove:hover:text-gray-300"
                                            id="reviews-tab" data-tabs-target="#reviews" type="button" role="tab"
                                            aria-controls="reviews" aria-selected="false">Reviews</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="default-tab-content">
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark-remove:bg-gray-800" id="description"
                                    role="tabpanel" aria-labelledby="description-tab">
                                    <div class="mce-content-body">
                                        <div class="pb-2 font-bold">{{ $data->short_description }}</div>
                                        <div class="">{!! $data->description !!}</div>
                                    </div>
                                </div>
                                <div class="hidden p-4 rounded-lg bg-gray-50 dark-remove:bg-gray-800" id="reviews"
                                    role="tabpanel" aria-labelledby="reviews-tab">
                                    @livewire('pages.public.items.reviews', [
                                        'itemId' => $data->id,
                                    ])
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="md:col-span-4 lg:col-span-4">
                    <div class="bg-gray-50 rounded-md shadow-lg px-4 py-2 border-t-2 border-gray-200">
                        <div class="">
                            <div class="flex space-x-2 items-center">
                                <div class="flex items-center mb-4 text-gray-300">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    @endfor
                                </div>
                                <div class="-mt-2.5">
                                    <button
                                        wire:click="$dispatch('openModal', {component: 'pages.public.items.modals.item-reviews', arguments: {id: {{ $data->id }} }})"
                                        class="text-teal-500 hover:underline">Write review</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-xl font-black leading-3 py-2">
                            @if ($data->discount)
                                <div class="flex justify-start space-x-2">
                                    <span class="text-gray-500">Tsh. <span
                                            class="line-through">{{ number_format($data->price) }}</span></span>
                                    <span class="text-gray-500"></span> {{ number_format($data->amount) }}

                                </div>
                            @else
                                <span class="text-gray-500">Tsh.</span> {{ number_format($data->price) }}
                            @endif
                        </div>
                        <div class="py-4 grid grid-cols-6 gap-4">
                            <div class="col-span-2">
                                <div class="flex space-x-2 bg-gray-200/50 px-2 text-gray-600 rounded-md py-0.5">
                                    <button class="" wire:click="decrementQuantity">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M4.25 12a.75.75 0 0 1 .75-.75h14a.75.75 0 0 1 0 1.5H5a.75.75 0 0 1-.75-.75Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <input type="text" wire:model.live="quantity" id=""
                                        class="w-8 px-0 text-center border-0 focus:outline-none focus:ring-0 focus:shadow-none rounded-md shadow-sm bg-transparent focus:border-sky-700">
                                    <button class="" wire:click="incrementQuantity">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="size-4">
                                            <path fill-rule="evenodd"
                                                d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-span-4">
                                <button
                                    wire:click="$dispatch('add_item', {itemId: {{ $data->id }}, quantity: '{{ $quantity }}'})"
                                    class="bg-teal-600 hover:bg-teal-500 rounded-md font-bold items-center px-3 py-2 w-full flex justify-center space-x-2 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-7">
                                        <path
                                            d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                                    </svg>
                                    <span class="text-xl">Buy Now</span>
                                </button>
                            </div>
                        </div>
                        <div class="" x-data="{ hovered: false }">
                            <a wire:click="$dispatch('wish_item', {itemId: {{ $data->id }}})"
                                class="flex cursor-pointer justify-center items-center space-x-2 text-teal-700"
                                title="Add to wish list" @mouseover="hovered = true" @mouseleave="hovered = false">
                                <i class="fa-regular fa-heart" x-show="!hovered"></i>
                                <i class="fa-solid fa-heart" x-show="hovered"></i>
                                <div class="">Add to wish list</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        {{-- <style>
            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                line-height: 1.4;
                margin: 1rem
            }

            table {
                border-collapse: collapse
            }

            table:not([cellpadding]) td,
            table:not([cellpadding]) th{padding:.4rem}table[border]:not([border="0"]):not([style*=border-width]) td,table[border]:not([border="0"]):not([style*=border-width]) th{border-width:1px}table[border]:not([border="0"]):not([style*=border-style]) td,table[border]:not([border="0"]):not([style*=border-style]) th{border-style:solid}table[border]:not([border="0"]):not([style*=border-color]) td,table[border]:not([border="0"]):not([style*=border-color]) th {
                border-color: #ccc
            }

            figure {
                display: table;
                margin: 1rem auto
            }

            figure figcaption {
                color: #999;
                display: block;
                margin-top: .25rem;
                text-align: center
            }

            hr {
                border-color: #ccc;
                border-style: solid;
                border-width: 1px 0 0 0
            }

            code {
                background-color: #e8e8e8;
                border-radius: 3px;
                padding: .1rem .2rem
            }

            .mce-content-body:not([dir=rtl]), blockquote {
                border-left: 2px solid #ccc;
                margin-left: 1.5rem;
                padding-left: 1rem
            }

            .mce-content-body[dir=rtl] blockquote {
                border-right: 2px solid #ccc;
                margin-right: 1.5rem;
                padding-right: 1rem;
            }
        </style> --}}

        <div class="py-8" wire:ignore>
            <div class="text-2xl font-bold w-full">You may be interested</div>
            <div class="w-36 h-0.5 bg-gray-200"></div>

            <div class="py-4">
                <div class="mb-4 border-b border-gray-50 dark-remove:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="similar-tab"
                                data-tabs-target="#similar" type="button" role="tab" aria-controls="similar"
                                aria-selected="false">Similar</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark-remove:hover:text-gray-300"
                                id="random-tab" data-tabs-target="#random" type="button" role="tab"
                                aria-controls="random" aria-selected="false">Random</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark-remove:bg-gray-800" id="similar" role="tabpanel"
                        aria-labelledby="similar-tab">
                        @livewire('pages.public.items.interests.similar', [
                            'category' => $context['category'],
                            'activeItem' => $data->id,
                        ])
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark-remove:bg-gray-800" id="random" role="tabpanel"
                        aria-labelledby="random-tab">
                        @livewire('pages.public.items.interests.random', [
                            'activeItem' => $data->id,
                        ])
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Add this script for arrow functionality -->
    <script>
        const scrollContainer = document.getElementById('scroll-container-2');
        const scrollLeft = document.getElementById('scroll-left');
        const scrollRight = document.getElementById('scroll-right');


        function checkOverflow() {
            // Check if the container is overflowing
            if (scrollContainer.scrollWidth > scrollContainer.clientWidth) {
                scrollLeft.classList.remove('hidden');
                scrollRight.classList.remove('hidden');
            } else {
                scrollLeft.classList.add('hidden');
                scrollRight.classList.add('hidden');
            }
        }

        scrollLeft.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: -300, // Adjust scroll amount as needed
                behavior: 'smooth'
            });
        });

        scrollRight.addEventListener('click', () => {
            scrollContainer.scrollBy({
                left: 300, // Adjust scroll amount as needed
                behavior: 'smooth'
            });
        });

        // Listen for scrolling to update the arrow visibility
        scrollContainer.addEventListener('scroll', checkOverflow);

        // Run on page load to check initial state
        window.addEventListener('load', checkOverflow);
        window.addEventListener('resize', checkOverflow); // Handle window resize
    </script>
</div>
