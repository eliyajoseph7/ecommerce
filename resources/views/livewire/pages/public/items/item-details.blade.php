<div class="w-full">
    <div class="w-full sm:px-2 md:px-32 lg:px-72">
        <div class="text-gray-400 py-2 flex space-x-1 border-b border-gray-300/70">
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
                <div class="col-span-1">
                    @foreach ($data->images as $image)
                        @if ($image->image != $context['active_img'])
                            <div>
                                <div class="h-28 rounded-md p-2 cursor-pointer"
                                    wire:click="$dispatch('update_active_img', {image: '{{ $image->image }}'})">
                                    <img src="{{ asset($image->image) }}" class="w-full h-full object-cover rounded-md">
                                </div>
                            </div>
                            {{-- <div x-data="{ updateActiveImg() { @this.call('updateActiveImg', '{{ $image->image }}') } }">
                                <div class="h-28 rounded-md p-2 cursor-pointer" @mouseenter="updateActiveImg"
                                    wire:click="$dispatch('update_active_img', {image: '{{ $image->image }}'})">
                                    <img src="{{ asset($image->image) }}" class="w-full h-full object-cover rounded-md">
                                </div>
                            </div> --}}
                            {{-- <div x-data="{
                                hasHovered: false,
                                updateActiveImg() {
                                    if (!this.hasHovered) {
                                        this.hasHovered = true;
                                        @this.call('updateActiveImg', '{{ $image->image }}');
                                    }
                                }
                            }" @mouseenter="updateActiveImg" @mouseleave="hasHovered = false">
                                <div class="h-28 rounded-md p-2 cursor-pointer"
                                    wire:click="$dispatch('update_active_img', {image: '{{ $image->image }}'})">
                                    <img src="{{ asset($image->image) }}" class="w-full h-full object-cover rounded-md">
                                </div>
                            </div> --}}
                        @endif
                    @endforeach
                </div>
                <div class="col-span-7">
                    <div class="h-[60vh]">
                        <img src="{{ asset($context['active_img']) }}" class="object-cover w-full h-full rounded-md">
                    </div>
                </div>
                <div class="col-span-4 px-3">
                    <div class="bg-gray-50 rounded-md shadow-lg px-4 py-2 border-t-2 border-gray-200">
                        <div class="">review</div>
                        <div class="text-xl font-bold leading-3">Tsh. {{ number_format($data->price) }}</div>
                        <div class="py-4 grid grid-cols-4 gap-4">
                            <div class="col-span-1">
                                <div class="flex space-x-2">
                                    <button class="text-2xl" wire:click="decrementQuantity">-</button>
                                    <input type="text" wire:model.live="quantity" id="" class="w-full px-0 text-center !border-gray-300 rounded-md shadow-sm focus:border-sky-700">
                                    <button class="text-2xl" wire:click="incrementQuantity">+</button>
                                </div>
                            </div>
                            <div class="col-span-3">
                                <button
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
        <div class="py-4">
            <div class="py-4">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="me-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="description-tab"
                                data-tabs-target="#description" type="button" role="tab"
                                aria-controls="description" aria-selected="false">Description</button>
                        </li>
                        <li class="me-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="reviews-tab" data-tabs-target="#reviews" type="button" role="tab"
                                aria-controls="reviews" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="description" role="tabpanel"
                        aria-labelledby="description-tab">
                        <div class="">
                            <div class="pb-2 font-bold">{{ $data->short_description }}</div>
                            <div class="">{!! $data->description !!}</div>
                        </div>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="reviews" role="tabpanel"
                        aria-labelledby="reviews-tab">
                    </div>
                </div>

            </div>
        </div>

        To attain knowledge, add things every day; To attain wisdom, subtract things every day.
    </div>
</div>
