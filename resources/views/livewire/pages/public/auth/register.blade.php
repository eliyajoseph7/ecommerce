<div class="w-full">
    <div class="w-full px-2 py-1 md:px-32 lg:px-72">
        <div class="text-gray-400 py-2 flex space-x-1 border-b border-gray-300/70">
            <a class="pr-1 hover:text-teal-700" href="{{ route('home') }}">Home</a>/

            <p>Registration</p>
        </div>
        <div class="py-2 w-full relative">
            <div class="fixed top-1/3 left-2/4 {{ $redirecting ? '' : 'hidden' }}">
                <div class="w-40 h-40 flex justify-center items-center">
                    <div class="bg-black/60 p-5 text-center rounded-md text-gray-200">
                        <i class="fa fa-spinner fa-spin text-4xl"></i>
                        <div class="">Redirecting..</div>
                    </div>

                </div>
            </div>
            <div class="grid sm:grid-cols-1 lg:grid-cols-8 gap-4 px-4 w-full">
                <div class="col-span-full lg:col-span-4">
                    <div class="text-2xl md:text-3xl font-bold text-gray-800">Profile Details</div>
                    <form wire:submit.prevent="submit" class="py-4">
                        <div class="">
                            <div class="text-xl md:text-2xl font-bold text-gray-700">Account Information</div>
                            <div class="">

                                <div class="mt-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Email Address <span class="text-red-500">*</span></label>
                                    <input wire:model.live.debounce.500ms="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        type="email" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Password <span class="text-red-500">*</span></label>
                                    <input wire:model.live.debounce.500ms="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        type="password" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Confirm Password <span class="text-red-500">*</span></label>
                                    <input wire:model.live.debounce.500ms="password_confirmation" id="password_confirmation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        type="password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="mt-10 mb-3 text-xl md:text-2xl font-bold text-gray-700">Contact Information</div>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                                    <div>
                                        <label for="first_name"
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">First
                                            name <span class="text-red-500">*</span></label>
                                        <input type="text" id="first_name"
                                            wire:model.live.debounce.500ms="first_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                            placeholder="John" />
                                        @error('first_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="last_name"
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Last
                                            name <span class="text-red-500">*</span></label>
                                        <input type="text" id="last_name" wire:model.live.debounce.500ms="last_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                            placeholder="Doe" />
                                        @error('last_name')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="phone"
                                        class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Phone
                                        number <span class="text-red-500">*</span></label>
                                    <input type="tel" id="phone" wire:model.live.debounce.500ms="phone"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        placeholder="255123456789" 
                                        {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"  --}}
                                        />
                                    @error('phone')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="company"
                                        class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Company
                                        Name</label>
                                    <input type="text" id="company" wire:model.live.debounce.500ms="company"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        placeholder="Flowbite" />
                                    @error('company')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label for="tin"
                                        class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Company
                                        TIN</label>
                                    <input type="url" id="tin" wire:model.live.debounce.500ms="tin"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                        placeholder="123-45-678" />
                                    @error('tin')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="">
                            <div class="mt-10 mb-3 text-xl md:text-2xl font-bold text-gray-700">Delivery/Shipping Information</div>
                            <div class="">
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="region_id" class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Region
                                            <span class="text-red-500">*</span></label>
                                        <select wire:model.live="region_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                            <option value="">Select..</option>
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
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">District <span
                                                class="text-red-500">*</span></label>
                                        <select wire:model.live="district_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                            <option value="">Select..</option>
                                            @foreach (isset($districts) ? $districts : [] as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="ward_id" class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Ward
                                            <span class="text-red-500">*</span></label>
                                        <select wire:model.live="ward_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                            <option value="">Select..</option>
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
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Village/Street <span
                                                class="text-red-500">*</span></label>
                                        <select wire:model.live="village_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                            <option value="">Select..</option>
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
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Address <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="company" wire:model.live.debounce.500ms="address"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                            placeholder="Azikiwe st, HNo. 12" />
                                            @error('address')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="text-xl md:text-2xl font-bold text-gray-700">Billing address</div>
                                <div class="flex items-center my-4">
                                    <input id="default-checkbox" @checked($toggleBillAddress) type="checkbox" wire:change.live="toggleBillAddress" wire:click="$dispatch('toggle_bill_info')"
                                        class="w-4 h-4 cursor-pointer text-teal-600 bg-gray-50 border-teal-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">My
                                        billing info are same with shipping information</label>
                                </div>
                                <div class="grid gap-6 mb-6 md:grid-cols-3 {{ $toggleBillAddress ? 'hidden' : '' }}">
                                    <div>
                                        <label for="billing_first_name"
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">First Name <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="billing_first_name"
                                            wire:model.live="billing.first_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                            placeholder="John" />
                                            @error('billing.first_name')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div>
                                        <label for="billing_last_name"
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Last Name <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="billing_last_name" wire:model.live.debounce.500ms="billing.last_name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                            placeholder="Doe" />
                                            @error('billing.last_name')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div>
                                        <label for="billing.region_id"
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Region
                                            <span class="text-red-500">*</span></label>
                                        <select wire:model.live="billing.region_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                            <option value="">Select..</option>
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
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">District <span
                                                class="text-red-500">*</span></label>
                                        <select wire:model.live="billing.district_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                            <option value="">Select..</option>
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
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Ward
                                            <span class="text-red-500">*</span></label>
                                        <select wire:model.live="billing.ward_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                            <option value="">Select..</option>
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
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Village/Street <span
                                                class="text-red-500">*</span></label>
                                        <select wire:model.live="billing.village_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500">
                                            <option value="">Select..</option>
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
                                            class="block mb-2 text-sm font-bold text-gray-700 dark:text-white">Address <span
                                                class="text-red-500">*</span></label>
                                        <input type="text" id="billing_address" wire:model.live.debounce.500ms="billing.address"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500"
                                            placeholder="Azikiwe, HNo. 12" />
                                        @error('billing.address')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class=""></div>
                            <div class="">
                                <div class="flex items-center my-4">
                                    <input id="default-checkbox" type="checkbox"  wire:model.live="subscribe"
                                        class="w-4 h-4 cursor-pointer text-teal-600 bg-gray-50 border-teal-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subscribe for news & updates</label>
                                </div>
                            </div>
                        </div>
                        <div class="my-5 bg-gray-100 px-0.5 py-1 rounded-md">
                            <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-gray-100 px-3 py-1 rounded-md">Register</button>
                        </div>
                    </form>
                </div>
                <div class="lg:col-span-4">
                    <div class="p-5">
                        <p>Fields with <span class="text-red-500">*</span> are mandatory.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('success', (message) => {
                Toast.fire({
                    icon: 'success',
                    title: message,
                });

                setTimeout(() => {
                    Livewire.dispatch('registered')
                }, 3000);
            })
        })
    </script>
</div>
