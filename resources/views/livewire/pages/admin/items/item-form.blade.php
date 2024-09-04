<div>
    <div class="relative">
        <x-slot name="header">
            @include('includes.breadcrumb', [
                'main' => 'Items',
                'menu' => 'Add Items',
            ])
        </x-slot>
        <div class="absolute -top-10 right-2 z-40">
            <a href="{{ route('item_list') }}" class="text-red-500 hover:text-red-700" title="Close">
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
                @foreach ($items as $index => $item)
                    <div class="md:grid md:grid-cols-5">
                        <div
                            class="text-xl font-bold mb-4 w-14 h-14 flex items-center justify-center bg-blue-500 rounded-full text-white">
                            <div class="">{{ $index + 1 }}</div>
                        </div>
                        <div class="col-span-4 mb-8 p-6 border rounded-lg bg-gray-100">


                            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-3">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Name <span
                                            class="text-red-500 text-sm">*</span></label>
                                    <input type="text" wire:model.lazy="items.{{ $index }}.name"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                    @error("items.$index.name")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Price <span
                                            class="text-red-500 text-sm">*</span></label>
                                    <input type="number" step="0.01"
                                        wire:model.live="items.{{ $index }}.price"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                    @error("items.$index.price")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-4 hidden">
                                <label class="block text-sm font-medium text-gray-700">Slug</label>
                                <input type="text" wire:model="items.{{ $index }}.slug"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                @error("items.$index.slug")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Short Description <span
                                        class="text-red-500 text-sm">*</span></label>
                                <input type="text" wire:model="items.{{ $index }}.short_description"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                @error("items.$index.short_description")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4 hidden">
                                <label class="block text-sm font-medium text-gray-700">Description <span
                                        class="text-red-500 text-sm">*</span></label>
                                <textarea wire:model.live="items.{{ $index }}.description"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                                @error("items.$index.description")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <div wire:ignore>
                                    <textarea id="itemDescription-{{ $index }}" data-index="{{ $index }}"></textarea>
                                </div>
                                @error("items.$index.description")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-3">
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Main Category</label>
                                    <select wire:model.live="items.{{ $index }}.main_category_id"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">Select Main Category</option>
                                        @foreach ($mainCategories as $mainCategory)
                                            <option value="{{ $mainCategory->id }}">{{ $mainCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("items.$index.main_category_id")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Category</label>
                                    <select wire:model.live="items.{{ $index }}.category_id"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                        <option value="">Select Category</option>
                                        @foreach (isset($categories[$index]) ? $categories[$index] : [] as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("items.$index.category_id")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Sub Category <span
                                        class="text-red-500 text-sm">*</span></label>
                                <select wire:model="items.{{ $index }}.sub_category_id"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">Select Sub Category</option>
                                    @foreach (isset($subCategories[$index]) ? $subCategories[$index] : [] as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                                @error("items.$index.sub_category_id")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-3">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Discount</label>
                                <select wire:model="items.{{ $index }}.discount_id"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">Select..</option>
                                    @foreach (isset($discounts) ? $discounts : [] as $discount)
                                        <option value="{{ $discount->id }}">{{ $discount->info }}</option>
                                    @endforeach
                                </select>
                                @error("items.$index.discount_id")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <select wire:model="items.{{ $index }}.status"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="" disabled>Select..</option>
                                    @foreach (isset($statuses) ? $statuses : [] as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error("items.$index.status")
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>

                            @if ($action == 'add')
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Images <span
                                            class="text-red-500 text-sm">*</span></label>
                                    <input type="file" wire:model.live="items.{{ $index }}.images" multiple
                                        accept="image/*"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                    @error("items.$index.images")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                    <div class="mt-2 flex space-x-4">
                                        @foreach ($item['images'] as $image)
                                            <div class="w-16 h-16">
                                                <img src="{{ $image->temporaryUrl() }}"
                                                    class="w-full h-full object-cover rounded-md" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                @foreach ($items as $index => $item)
                                    <!-- Existing Images -->
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Existing Images</label>
                                        <div class="flex space-x-4">
                                            @foreach ($item['existing_images'] as $existingImage)
                                                <div class="w-16 h-16 relative">
                                                    <div class="absolute top-1/3 left-1/3 opacity-0 hover:opacity-100 text-red-500 bg-red-100 rounded-md"
                                                        title="Delete Image">
                                                        <button
                                                            wire:click.prevent="$dispatch('confirm_img_delete', {image: '{{ $existingImage }}'})"><svg
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <img src="{{ asset($existingImage) }}"
                                                        class="w-full h-full object-cover rounded-md" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Edit Images -->
                                    <div class="mb-4">
                                        <label class="block text-sm font-medium text-gray-700">Edit Images</label>
                                        <input type="file" wire:model.live="items.{{ $index }}.images"
                                            multiple accept="image/*"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                                        @error("items.$index.images")
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror

                                        <div class="mt-2 flex space-x-4">
                                            @foreach ($item['images'] as $image)
                                                <div class="w-16 h-16">
                                                    <img src="{{ $image->temporaryUrl() }}"
                                                        class="w-full h-full object-cover rounded-md" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if ($action == 'add')
                                <div class="flex justify-end">
                                    <button type="button" wire:click="removeItem({{ $index }})"
                                        class="px-4 py-2 bg-red-600 text-white rounded-md">Remove</button>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                <div class="block md:flex {{ $action == 'add' ? 'justify-between' : 'justify-end' }}">
                    @if ($action == 'add')
                        <div class="mb-4">
                            <button type="button" wire:click="addItem"
                                class="w-full px-4 py-2 md:px-5 md:py-3 bg-green-600 text-white rounded-md md:rounded-full items-center"><span
                                    class="text-2xl font-bold">+</span><span class="md:hidden">Add Another
                                    Item</span></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <button type="submit"
                            class="w-full px-4 py-2 bg-blue-600 text-white rounded-md">{{ $action == 'add' ? 'Save All Items' : 'Update' }}
                        </button>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <script data-navigate-once>
        document.addEventListener('livewire:init', () => {
            // delete
            Livewire.on('confirm_img_delete', (image) => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete_image', {
                            'image': image
                        });
                    }
                });
            });



        })
    </script>
    <script>
        function initTinyMce() {
            tinymce.init({
                selector: 'textarea[id^="itemDescription-"]',
                setup: function(editor) {
                    editor.on('init change', function() {
                        editor.save();
                    });
                    editor.on('change keyup paste', function(e) {
                        var id = $(this).attr('id');
                        var index = $('#' + id).attr('data-index');
                        @this.set('items.' + index + '.description', editor.getContent());
                    });
                },
                plugins: 'code table lists advlist',
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                menubar: true,
                // content_css: "{{ asset('assets/tinymce/default/content.css') }}'}}", // Include your custom CSS here
                extended_valid_elements: 'class', // Preserve classes on spans
            });
        }

        // function initTinyMce() {
        //     tinymce.init({
        //         // selector: '#itemDescription',
        //         selector: 'textarea[id^="itemDescription-"]',
        //         setup: function(editor) {
        //             editor.on('init change', function() {
        //                 editor.save();
        //             });
        //             editor.on('change keyup paste', function(e) {
        //                 var id = $(this).attr('id')
        //                 var index = $('#' + id).attr('data-index');
        //                 @this.set('items.' + index + '.description', editor.getContent());
        //             });
        //         },
        //         plugins: 'code table lists advlist',
        //         // plugins: [
        //         //     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        //         //     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        //         //     "save table contextmenu directionality emoticons template paste textcolor"
        //         // ],
        //         toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
        //         menubar: true,
        //     });
        // }
        document.addEventListener('livewire:init', function() {
            initTinyMce()

            Livewire.on('reinitialize_tinymce', () => {
                // console.log('initialized');
                tinymce.remove()
                setTimeout(initTinyMce, 100)
            })

            Livewire.on('set_description', description => {
                // console.log(description);
                var editorId = 'itemDescription-0';
                if (tinymce.get(editorId)) {
                    tinymce.get(editorId).setContent(description[0]); // Set content using TinyMCE API
                } else {
                    $('#' + editorId).val(description[
                        0]); // Fallback to jQuery if TinyMCE instance is not initialized
                }
            });


            Livewire.on('contentChanged', function() {
                setTimeout(initTinyMce, 100); // reinitialize after content change
            });
        });

        // document.addEventListener('livewire:update', function () {
        //     tinymce.get('itemDescription').setContent(@this.get('description'));
        // });

        // document.addEventListener('livewire:update', function () {
        //     console.log('upda');
        //     setTimeout(initTinyMce, 100); // reinitialize after Livewire update
        // });
    </script>
</div>
