<div>
    <div class="border-b py-2">
        <div class="flex space-x-4 items-center">
            <div
                class="w-16 h-16 bg-gray-100 rounded-full flex justify-center items-center text-3xl font-bold text-gray-600">
                2</div>
            <div class="font-bold text-2xl text-gray-700">Delivery Information</div>
        </div>
        <div class="pl-16 py-4">

            <form>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John" required />
                    </div>
                    <div>
                        <label for="last_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">District <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Doe" required />
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ward
                            <span class="text-red-500">*</span></label>
                        <input type="tel" id="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="255123456789" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
                    </div>
                    <div class="">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Village/Street <span
                                class="text-red-500">*</span></label>
                        <input type="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="john.doe@company.com" required />
                    </div>
                    <div class="col-span-full">
                        <label for="company"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="company"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Flowbite" />
                    </div>
                </div>
                <div class="">Billing address</div>
                <div class="flex items-center my-4">
                    <input id="default-checkbox" type="checkbox" wire:change.live="toggleBillAddress"
                        class="w-4 h-4 cursor-pointer text-teal-600 bg-gray-50 border-teal-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">My
                        billing info differs with shipping address</label>
                </div>
                <div class="{{ $showBillAddress ? 'grid' : 'hidden' }} gap-6 mb-6 md:grid-cols-3">
                    <div>
                        <label for="billing_first_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="billing_first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John" required />
                    </div>
                    <div>
                        <label for="billing_last_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="billing_last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Doe" required />
                    </div>
                    <div>
                        <label for="billing_region_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="billing_region_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John" required />
                    </div>
                    <div>
                        <label for="billing_district_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">District <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="billing_district_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Doe" required />
                    </div>
                    <div>
                        <label for="billing_ward"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ward <span
                                class="text-red-500">*</span></label>
                        <input type="tel" id="billing_ward"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="255123456789" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
                    </div>
                    <div class="">
                        <label for="billing_village_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Village/Street <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="billing_village_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="jSample" required />
                    </div>
                    <div class="col-span-full">
                        <label for="company"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="company"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Flowbite" />
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
