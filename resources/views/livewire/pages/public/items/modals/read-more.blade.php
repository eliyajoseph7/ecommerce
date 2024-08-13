<div>
    <div class="flex justify-between px-1 py-4 bg-gray-100/80">
        <div class="font-lg text-gray-700 font-bold">Read a review</div>
        <a wire:click="$dispatch('closeModal')" class="text-red-500 hover:text-red-700 cursor-pointer" title="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
    </div>
    <div class="px-8 py-3">
        <div class="flex space-x-2">
            <div
                class="w-10 h-10 flex justify-center items-center text-2xl bg-teal-100/50 rounded-full ring-2 ring-teal-50">
                @if ($review->score == 5)
                    😂
                @elseif ($review->score == 4)
                    🤗
                @elseif ($review->score == 3)
                    😊
                @elseif ($review->score == 2)
                    😔
                @else
                    😟
                @endif
            </div>

            <div class="">
                <div class="">{{ $review->customer }}</div>
                <div class="flex items-center mb-4 text-gray-300">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-5 h-5 me-1 cursor-pointer {{ $review->score >= $i ? 'text-amber-500' : 'text-gray-300' }}"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    @endfor
                    @if ($review->canedit)
                        <div class="hover:text-gray-500 cursor-pointer"
                            wire:click="$dispatch('openModal', {component: 'pages.public.items.modals.item-reviews', arguments: {id: {{ $review->item_id }}, reviewId: {{ $review->id }} }})">
                            <i class="fa fa-pencil"></i> Edit review
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="max-h-[90vh] min-h-[50vh] overflow-y-auto">
            <div class="px-4 mb-2">
                {{ $review->comment }}
            </div>
        </div>
    </div>
</div>
