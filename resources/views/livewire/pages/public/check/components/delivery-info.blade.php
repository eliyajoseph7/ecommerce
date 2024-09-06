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
                        <label for="region_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region
                            <span class="text-red-500">*</span></label>
                        <select wire:model.live="region_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Region</option>
                            @foreach (isset($regions) ? $regions : [] as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                        @error('region_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="district_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">District <span
                                class="text-red-500">*</span></label>
                        <select wire:model.live="district_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select District</option>
                            @foreach (isset($districts) ? $districts : [] as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="ward_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ward
                            <span class="text-red-500">*</span></label>
                        <select wire:model.live="ward_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Ward</option>
                            @foreach (isset($wards) ? $wards : [] as $ward)
                                <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                            @endforeach
                        </select>
                        @error('ward_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="village_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Village/Street <span
                                class="text-red-500">*</span></label>
                        <select wire:model.live="village_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Village/Street</option>
                            @foreach (isset($villages) ? $villages : [] as $village)
                                <option value="{{ $village->id }}">{{ $village->name }}</option>
                            @endforeach
                        </select>
                        @error('village_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-full">
                        <label for="company"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="company" wire:model.live.debounce.500ms="address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Azikiwe st, HNo. 12" />
                            @error('address')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
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
                            wire:model.live.debounce.500ms="billing.first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="John" required />
                            @error('billing.first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div>
                        <label for="billing_last_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="billing_last_name" wire:model.live.debounce.500ms="billing.last_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Doe" required />
                            @error('billing.last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div>
                        <label for="billing.region_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Region
                            <span class="text-red-500">*</span></label>
                        <select wire:model.live="billing.region_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Region</option>
                            @foreach (isset($billingRegions) ? $billingRegions : [] as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                        @error('billing.region_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="billing.district_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">District <span
                                class="text-red-500">*</span></label>
                        <select wire:model.live="billing.district_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select District</option>
                            @foreach (isset($billingDistricts) ? $billingDistricts : [] as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                        @error('billing.district_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="billing.ward_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ward
                            <span class="text-red-500">*</span></label>
                        <select wire:model.live="billing.ward_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Ward</option>
                            @foreach (isset($billingWards) ? $billingWards : [] as $ward)
                                <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                            @endforeach
                        </select>
                        @error('billing.ward_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="billing_village_id"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Village/Street <span
                                class="text-red-500">*</span></label>
                        <select wire:model.live="billing.village_id"
                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Select Village/street</option>
                            @foreach (isset($billingVillages) ? $billingVillages : [] as $village)
                                <option value="{{ $village->id }}">{{ $village->name }}</option>
                            @endforeach
                        </select>
                        @error('billing.village_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-full">
                        <label for="billing_address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="billing_address" wire:model.live.debounce.500ms="billing.address"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Azikiwe, HNo. 12" />
                        @error('billing.address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
