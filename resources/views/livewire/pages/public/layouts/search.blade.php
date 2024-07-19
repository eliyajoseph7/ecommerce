<div class="w-full relative">
    <div class="relative w-full">
        <input type="text" id="search" wire:model.live="keyword" wire:keyup="loadData"
            class="block p-2 w-full z-20 text-sm border-0 text-gray-900 bg-green-50 focus:outline-none focus:shadow-none focus:bg-gray-100 rounded-xl border-transparent focus:ring-0 focus:border-transparent"
            placeholder="Search product items..." />
        <div
            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-gray-400 bg-transparent rounded-lg border border-transparent">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
            <span class="sr-only">Search</span>
        </div>
    </div>
    <div class="absolute w-full bg-white rounded-b-md px-2.5 py-1 z-50 {{ $keyword ? '' : 'hidden' }}">
        <div class="h-48 overflow-auto ">
            @forelse ($results as $key=>$result)
            <div class="text-sm bg-gray-100/35">
                <a href="{{ route('public_items', $result->first()->category->slug) }}"
                    class="block py-2 font-bold hover:text-sky-900 dark:hover:bg-gray-600 dark:hover:text-white">{{ $key }}</a>
                
            </div>
            <div class="px-3 py-1">
                <div class="grid grid-cols-2 gap-2">
                    @foreach ($result as $dt)
                    <a href="{{ route('public_items', $dt->category->slug) }}">
                        <div class="grid grid-cols-6 gap-2">
                            <div class="">
                                <img src="{{ asset($dt->images?->first()?->image) }}" class="w-8 h-8 object-cover rounded-md">
                            </div>
                            <div class="col-span-5">
                                <div class="normal-case text-sm text-teal-700">{{ Str::length($dt->name) > 30 ? Str::limit($dt->name, 30, '...') : $dt->name }}</div>
                                <div class="normal-case text-sm text-gray-400">
                                    {{ Str::length($dt->short_description) > 30 ? Str::limit($dt->short_description, 30, '...') : $dt->short_description }}
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

        @empty
            <div class="">No record found</div>
        @endforelse
        </div>
        <div class="{{ $searching ? 'flex' : 'hidden' }} justify-center text-lg">
            <div class="w-14 h-14 flex items-center justify-center bg-gray-100 rounded-full">
                <i class="fa-solid fa-spinner fa-spin fa-2x animate-spin"></i>
            </div>
        </div>
    </div>
</div>
