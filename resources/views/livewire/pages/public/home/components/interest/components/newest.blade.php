<div>
    @if ($loading)
        Loading
    @else
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-0">
        @forelse ($newest as $new)
            <div class="border-[1px] border-b-white hover:border-b-gray-300 px-2 p y-3.5 mb-4 cursor-pointer">
                <div class="h-72">
                    <img src="{{ $new->image }}" class="h-full w-full rounded-lg object-cover ease-in-out duration-700 hover:scale-105">
                </div>
                <div class="py-4">{{ $new->name }}</div>
                <div class="flex justify-between py-2">
                    <div class="">TSh. {{ $new->price }}</div>
                    <button class="rounded-md p-1 ring-2 ring-green-700 hover:ring-green-600 hover:bg-green-600 hover:shadow-sm text-green-700 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        @empty
            
        @endforelse
    </div>
    @endif
    <div class="text-center">
        <button class="ring-1 ring-offset-1 ring-green-700 hover:ring-green-600 rounded-xl px-5 py-1.5 text-green-700">Load More</button>
    </div>
</div>
