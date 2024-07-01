<div>
    <x-slot name="header">
        @include('includes.breadcrumb', [
            'main' => 'Items',
            'menu' => 'Add Items',
        ])
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto py-10">
            <form wire:submit.prevent="submit">
                @foreach ($items as $index => $item)
                    <div class="mb-8 p-6 border rounded-lg bg-gray-100">
                        <h2 class="text-lg font-semibold mb-4">Item {{ $index + 1 }}</h2>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" wire:model.lazy="items.{{ $index }}.name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error("items.$index.name") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" wire:model="items.{{ $index }}.slug" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error("items.$index.slug") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Short Description</label>
                            <input type="text" wire:model="items.{{ $index }}.short_description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error("items.$index.short_description") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea wire:model.live="items.{{ $index }}.description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                            @error("items.$index.description") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="number" step="0.01" wire:model.live="items.{{ $index }}.price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error("items.$index.price") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Main Category</label>
                            <select wire:model.live="items.{{ $index }}.main_category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Select Main Category</option>
                                @foreach($mainCategories as $mainCategory)
                                    <option value="{{ $mainCategory->id }}">{{ $mainCategory->name }}</option>
                                @endforeach
                            </select>
                            @error("items.$index.main_category_id") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Category</label>
                            <select wire:model.live="items.{{ $index }}.category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Select Category</option>
                                @foreach(isset($categories[$index]) ? $categories[$index] : [] as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error("items.$index.category_id") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Sub Category</label>
                            <select wire:model="items.{{ $index }}.sub_category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">Select Sub Category</option>
                                @foreach(isset($subCategories[$index]) ? $subCategories[$index] : [] as $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                            @error("items.$index.sub_category_id") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Images</label>
                            <input type="file" wire:model.live="items.{{ $index }}.images" multiple class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                            @error("items.$index.images.*") <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        
                            <div class="mt-2 flex space-x-4">
                                @foreach ($item['images'] as $image)
                                    <div class="w-16 h-16">
                                        <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover rounded-md" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
        
                        <div class="flex justify-end">
                            <button type="button" wire:click="removeItem({{ $index }})" class="px-4 py-2 bg-red-600 text-white rounded-md">Remove</button>
                        </div>
                    </div>
                @endforeach
        
                <div class="mb-4">
                    <button type="button" wire:click="addItem" class="px-4 py-2 bg-green-600 text-white rounded-md">Add Another Item</button>
                </div>
        
                <div class="mb-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save All Items</button>
                </div>
            </form>
        </div>
        
    </div>
</div>
