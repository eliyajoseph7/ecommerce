<div>
    <div class="border-b">
        <div class="flex space-x-4 items-center">
            <div
                class="w-16 h-16 bg-gray-100 rounded-full flex justify-center items-center text-3xl font-bold text-gray-600">
                1</div>
            <div class="font-bold text-2xl text-gray-700">Customer Information</div>
        </div>
        <div class="pl-16 py-4">
            <form>
                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark-remove:text-white">First
                            name <span class="text-red-500">*</span></label>
                        <input type="text" id="first_name" wire:model.live.debounce.500ms="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark-remove:bg-gray-700 dark-remove:border-gray-600 dark-remove:placeholder-gray-400 dark-remove:text-white dark-remove:focus:ring-blue-500 dark-remove:focus:border-blue-500"
                            placeholder="John" required />
                        @error('first_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark-remove:text-white">Last
                            name <span class="text-red-500">*</span></label>
                        <input type="text" id="last_name" wire:model.live.debounce.500ms="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark-remove:bg-gray-700 dark-remove:border-gray-600 dark-remove:placeholder-gray-400 dark-remove:text-white dark-remove:focus:ring-blue-500 dark-remove:focus:border-blue-500"
                            placeholder="Doe" required />
                        @error('last_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark-remove:text-white">Phone
                            number <span class="text-red-500">*</span></label>
                        <input type="tel" id="phone" wire:model.live.debounce.500ms="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark-remove:bg-gray-700 dark-remove:border-gray-600 dark-remove:placeholder-gray-400 dark-remove:text-white dark-remove:focus:ring-blue-500 dark-remove:focus:border-blue-500"
                            placeholder="255123456789" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark-remove:text-white">Email
                            address <span class="text-red-500">*</span></label>
                        <input type="email" id="email" wire:model.live.debounce.500ms="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark-remove:bg-gray-700 dark-remove:border-gray-600 dark-remove:placeholder-gray-400 dark-remove:text-white dark-remove:focus:ring-blue-500 dark-remove:focus:border-blue-500"
                            placeholder="john.doe@company.com" required />
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="company"
                            class="block mb-2 text-sm font-medium text-gray-900 dark-remove:text-white">Company Name</label>
                        <input type="text" id="company" wire:model.live.debounce.500ms="company"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark-remove:bg-gray-700 dark-remove:border-gray-600 dark-remove:placeholder-gray-400 dark-remove:text-white dark-remove:focus:ring-blue-500 dark-remove:focus:border-blue-500"
                            placeholder="Flowbite" />
                        @error('company')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="tin"
                            class="block mb-2 text-sm font-medium text-gray-900 dark-remove:text-white">Company TIN</label>
                        <input type="url" id="tin" wire:model.live.debounce.500ms="tin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark-remove:bg-gray-700 dark-remove:border-gray-600 dark-remove:placeholder-gray-400 dark-remove:text-white dark-remove:focus:ring-blue-500 dark-remove:focus:border-blue-500"
                            placeholder="123-45-678" />
                        @error('tin')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            // Livewire.on('submit_order', () => {
            //     // alert()
            // })
        })
    </script>
</div>
