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
        <div class="grid grid-cols-5">
            @for ($i = 0; $i < 5; $i++)
                <div role="status"
                    class="max-w-sm p-4 border border-gray-200 rounded shadow animate-pulse md:p-6 dark-remove:border-gray-700">
                    <div class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded dark-remove:bg-gray-700">
                        <svg class="w-10 h-10 text-gray-200 dark-remove:text-gray-600" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                            <path
                                d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z" />
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                        </svg>
                    </div>
                    <div class="h-2.5 bg-gray-200 rounded-full dark-remove:bg-gray-700 w-48 mb-4"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark-remove:bg-gray-700 mb-2.5"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark-remove:bg-gray-700 mb-2.5"></div>
                    <div class="h-2 bg-gray-200 rounded-full dark-remove:bg-gray-700"></div>
                    <div class="flex items-center mt-4">
                        <svg class="w-10 h-10 me-3 text-gray-200 dark-remove:text-gray-700" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                        <div>
                            <div class="h-2.5 bg-gray-200 rounded-full dark-remove:bg-gray-700 w-32 mb-2"></div>
                            <div class="w-48 h-2 bg-gray-200 rounded-full dark-remove:bg-gray-700"></div>
                        </div>
                    </div>
                    <span class="sr-only">Loading...</span>
                </div>
            @endfor
        </div>
    @else
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-0">
            @forelse ($recommendation as $new)
                @include('livewire.pages.public.components.item-card', ['item' => $new])
            @empty
                <p>No items found</p>
            @endforelse
        </div>

    @endif
    <div class="text-center py-8">
        @if ($loadMore)
            @if ($loading)
                <div class="flex justify-start">
                    <img src="{{ asset('assets/images/spinner.gif') }}" class="w-10">
                </div>
            @else
                <button wire:click="$dispatch('load_more_recommended')" class="bg-teal-50 text-teal-500 px-3 py-1 rounded-md">Load
                    More</button>
            @endif
        @endif
    </div>
</div>
