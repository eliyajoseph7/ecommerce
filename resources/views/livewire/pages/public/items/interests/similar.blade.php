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
                @include('livewire.pages.public.components.item-card', ['item' => $new])
            @empty
                <p>No items found</p>
            @endforelse
        </div>

    @endif
    <div class="text-center py-2">
        @if ($loadMore)
            @if ($loading)
                <div class="flex justify-start">
                    <img src="{{ asset('assets/images/spinner.gif') }}" class="w-10">
                </div>
            @else
                <button wire:click="$dispatch('load_more')" class="bg-teal-50 text-teal-500 px-3 py-1 rounded-md">Load
                    More</button>
            @endif
        @endif
    </div>
</div>
