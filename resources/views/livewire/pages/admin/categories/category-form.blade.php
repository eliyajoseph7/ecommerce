<div>
    <div class="relative">
        <x-slot name="header">
            @include('includes.breadcrumb', [
                'main' => 'Categories',
                'menu' => 'Add Category',
            ])
        </x-slot>
        <div class="absolute -top-10 right-2 z-40">
            <a href="{{ route('category_list') }}" class="text-red-500 hover:text-red-700" title="Close">
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
                @foreach ($categories as $index => $category)
                    <div class="md:grid md:grid-cols-5">
                        <div
                            class="text-xl font-bold mb-4 w-14 h-14 flex items-center justify-center bg-blue-500 rounded-full text-white">
                            <div class="">{{ $index + 1 }}</div>
                        </div>
                        <div class="col-span-4 mb-8 p-6 border rounded-lg bg-gray-100">


                            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-3">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Main Category</label>
                                    <select wire:model.live="categories.{{ $index }}.main_category_id"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">Select Main Category</option>
                                        @foreach ($menus as $mainCategory)
                                            <option value="{{ $mainCategory->id }}">{{ $mainCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("categories.$index.main_category_id")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Category Name <span
                                            class="text-red-500 text-sm">*</span></label>
                                    <input type="text" wire:model.lazy="categories.{{ $index }}.name"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                    @error("categories.$index.name")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-4 hidden">
                                <label class="block text-sm font-medium text-gray-700">Slug</label>
                                <input type="text" wire:model="categories.{{ $index }}.slug"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                @error("categories.$index.slug")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Status <span
                                        class="text-red-500 text-sm">*</span></label>
                                        <select wire:model.live="categories.{{ $index }}.status"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="active">Active</option>
                                            <option value="in active">In Active</option>
                                    </select>
                                @error("categories.$index.status")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($action == 'add' && $loop->iteration != 1)
                                <div class="flex justify-end">
                                    <button type="button" wire:click="removeMainCategory({{ $index }})"
                                        class="px-4 py-2 bg-red-600 text-white rounded-md">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="block md:flex {{ $action == 'add' ? 'justify-between' : 'justify-end' }}">
                    @if ($action == 'add')
                        <div class="mb-4">
                            <button type="button" wire:click="addMainCategory"
                                class="w-full px-4 py-2 md:px-5 md:py-3 bg-green-600 text-white rounded-md md:rounded-full items-center"><span
                                    class="text-2xl font-bold">+</span><span class="md:hidden">Add Another
                                    Category</span></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white rounded-md">{{ $action == 'add' ? 'Save All Categories' : 'Update' }}
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
