<div>
    @forelse ($reviews as $review)
        <div class="mb-6 border-b border-gray-100">
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
                    <div class="flex items-center text-gray-300">
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
                                wire:click="$dispatch('openModal', {component: 'pages.public.items.modals.item-reviews', arguments: {id: {{ $itemId }}, reviewId: {{ $review->id }} }})">
                                <i class="fa fa-pencil"></i> Edit review
                            </div>
                        @endif
                    </div>
                    <div class="text-sm text-gray-400">{{ $review->created_at->diffForHumans() }}</div>
                </div>
            </div>
            <div class="px-4 mt-4 mb-2">
                {!! Str::limit($review->comment, 200, '..') !!}
                @if (Str::length($review->comment) > 200)
                    <button
                        wire:click="$dispatch('openModal', {component: 'pages.public.items.modals.read-more', arguments: {id: {{ $review->id }} }})"
                        class="bg-sky-50 text-sky-500 px-3 py-1 rounded-md text-sm">Read more</button>
                @endif
            </div>
        </div>
    @empty
        <div wire:click="$dispatch('openModal', {component: 'pages.public.items.modals.item-reviews', arguments: {id: {{ $itemId }} }})"
            class="w-full h-20 bg-gray-100 hover:bg-gray-50 rounded-md cursor-pointer flex justify-center items-center"
            title="Click to write review">
            <div class="text-gray-500">
                No review, click to add.
            </div>
        </div>
    @endforelse
    @if ($loadMore)
        @if ($loading)
            <div class="flex justify-start">
                <img src="{{ asset('assets/images/spinner.gif') }}" class="w-10">
            </div>
        @else
            <button wire:click="$dispatch('load_more_reviews')" class="bg-teal-50 text-teal-500 px-3 py-1 rounded-md">Load
                More</button>
        @endif
    @endif
    @if ($reviews)
        <div class="flex justify-end space-x-2 items-center">
            <div class="flex items-center mb-4 text-gray-300">
                @for ($i = 0; $i < 3; $i++)
                    <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 22 20">
                        <path
                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                    </svg>
                @endfor
            </div>
            <div class="-mt-2.5">
                <button
                    wire:click="$dispatch('openModal', {component: 'pages.public.items.modals.item-reviews', arguments: {id: {{ $review->item_id }} }})"
                    class="text-teal-500 hover:underline">Write your review</button>
            </div>
        </div>
    @endif
</div>
