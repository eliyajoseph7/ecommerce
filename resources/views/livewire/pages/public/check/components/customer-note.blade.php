<div>
    <div class="border-b py-4">
        <div class="flex space-x-4 items-center">
            <div
                class="w-16 h-16 bg-gray-100 rounded-full flex justify-center items-center text-3xl font-bold text-gray-600">
                4</div>
            <div class="font-bold text-2xl text-gray-700">Customer's Note</div>
        </div>
        <div class="pl-16 py-4">

            <form>
                <div class="grid gap-6 mb-6 md:grid-cols-3">
                    <div class="col-span-full">
                        {{-- <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label> --}}
                        <textarea type="text" id="note" rows="3"  wire:model.live.debounce.500ms="note"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write note"></textarea>
                    </div>
                </div>
                <div class="flex items-center my-4">
                    <input id="default-checkbox" type="checkbox"  wire:model.live="subscribe"
                        class="w-4 h-4 cursor-pointer text-teal-600 bg-gray-50 border-teal-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subscribe for news & updates</label>
                </div>
            </form>

        </div>
    </div>
</div>
