<div>
    <div class="flex justify-between px-1 py-4 bg-gray-100/80">
        <div class="font-lg text-gray-700 font-bold">Write a review</div>
        <a wire:click="$dispatch('closeModal')" class="text-red-500 hover:text-red-700 cursor-pointer" title="Close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
    </div>
    <div class="px-8 py-3">
        <form wire:submit.prevent="submit">
            <div class="h-[50vh] overflow-y-auto">
                <div class="">
                    <div class="">Your rating <span class="text-red-500">*</span></div>
                    {{-- <div class="flex items-center mb-4 text-gray-300">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 me-1 cursor-pointer star"
                                 wire:click="setRating({{ $i }})"
                                 data-value="{{ $i }}"
                                 aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor"
                                 viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endfor
                    </div> --}}
                    <div x-data="{ score: @entangle('score') }" class="flex items-center mb-4 text-gray-300">
                        <template x-for="star in [1, 2, 3, 4, 5]" :key="star">
                            <svg
                                @mouseover="score = star"
                                @mouseleave="score = $wire.get('score')"
                                @click="$wire.setRating(star)"
                                :class="score >= star ? 'text-amber-500' : 'text-gray-300'"
                                class="w-5 h-5 me-1 cursor-pointer"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        </template>
                    </div>
                    
                    @error('score')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="">Comment <span class="text-red-500">*</span></div>
                    <div class="">
                        <textarea wire:model="comment" rows="8" class="mt-1 block p-2 w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter comment"></textarea>
                        @error('comment')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <div class="">Your Name <span class="text-red-500">*</span></div>
                    <div class="">
                        <input type="text" wire:model="customer"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter your full name" />
                        @error('customer')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="pt-3 w-full">
                <button type="submit" class="bg-sky-900/80 hover:bg-sky-800 text-white px-3.5 py-1.5 rounded-md flex justify-center items-center space-x-2">
                     @if ($submitting)
                         <i class="fa fa-spinner fa-spin"></i>
                     @endif                
                    <span>
                        Submit
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>
