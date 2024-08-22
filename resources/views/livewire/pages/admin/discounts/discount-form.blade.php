<div>
    <div class="relative">
        <x-slot name="header">
            @include('includes.breadcrumb', [
                'main' => 'Discounts',
                'menu' => 'Add Discounts',
            ])
        </x-slot>
        <div class="absolute -top-10 right-2 z-40">
            <a href="{{ route('discount_list') }}" class="text-red-500 hover:text-red-700" title="Close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>
    </div>
    <div class="">
        <div class="max-w-7xl mx-auto py-10">
            <form wire:submit.prevent="submit">
                @foreach ($discounts as $index => $discount)
                    <div class="md:grid md:grid-cols-8 relative">
                        <div class="flex md:block justify-between items-center">
                            <div
                                class="text-xl font-bold mb-4 w-14 h-14 flex items-center justify-center bg-blue-500 rounded-full text-white">
                                <div class="">{{ $index + 1 }}</div>
                            </div>
                            <div class="md:absolute top-1/2 right-0">
                                @if ($index != 0)
                                    <a wire:click="removeDiscount({{ $index }})"
                                        class="cursor-pointer text-red-600 hover:text-red-500 rounded-md"
                                        title="Remove">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                @endif
                            </div>

                        </div>
                        <div class="col-span-6 mb-8 p-6 border rounded-lg bg-gray-100">


                            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-3">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Name <span
                                            class="text-red-500 text-sm">*</span></label>
                                    <input type="text" wire:model.lazy="discounts.{{ $index }}.name"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                    @error("discounts.$index.name")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Percentage <span
                                            class="text-red-500 text-sm">*</span></label>
                                    <input type="number" step="0.01"
                                        wire:model.live="discounts.{{ $index }}.percentage"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                    @error("discounts.$index.percentage")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Description <span
                                        class="text-red-500 text-sm">*</span></label>
                                <input type="text" wire:model="discounts.{{ $index }}.description"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                @error("discounts.$index.description")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-3">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Start Date <span
                                            class="text-red-500 text-sm">*</span></label>
                                    <input type="date" wire:model.live="discounts.{{ $index }}.start_date"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                    @error("discounts.$index.start_date")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">End Date</label>
                                    <input type="date" wire:model.live="discounts.{{ $index }}.end_date"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                    @error("discounts.$index.end_date")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="block md:flex {{ $action == 'add' ? 'justify-between' : 'justify-end' }}">
                    @if ($action == 'add')
                        <div class="mb-4">
                            <button type="button" wire:click="addDiscount"
                                class="w-full px-4 py-2 md:px-5 md:py-3 bg-green-600 text-white rounded-md md:rounded-full items-center"><span
                                    class="text-2xl font-bold">+</span><span class="md:hidden">Add Another
                                    Discount</span></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white rounded-md">{{ $action == 'add' ? 'Save All Discounts' : 'Update' }}
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <script>
        document.addEventListener('livewire:init', function() {

        });
    </script>
</div>
