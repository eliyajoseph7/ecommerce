<div class="w-full z-10">
    <div class="px-2 md:px-32 lg:px-72">
        <div class="grid sm:grid-cols-1 lg:grid-cols-12 gap-4 py-4 relative">
            <div class="md:col-span-8 py-4">
                <div class="py-8 relative">
                    <div class="fixed top-1/3 left-1/3 {{ $redirecting ? '' : 'hidden' }}">
                        <div class="w-40 h-40 flex justify-center items-center">
                            <div class="bg-black/60 p-5 text-center rounded-md text-gray-200">
                                <i class="fa fa-spinner fa-spin text-4xl"></i>
                                <div class="">Redirecting..</div>
                            </div>

                        </div>
                    </div>
                    @if (!Helper::is_auth())
                        <div class="flex justify-end space-x-2 items-center">
                            <div class="text-gray-400">To automatically fill your information</div>
                            <a href="{{ route('signin') }}"
                                class="bg-gray-800/50 px-3 py-1 rounded-md text-white hover:bg-gray-700">Signin</a>
                        </div>
                    @endif
                    @livewire('pages.public.check.components.customer-info')
                    @livewire('pages.public.check.components.delivery-info')
                    <div class="border-b border-gray-200/50">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 py-2 mb-6">
                            <div class="mt-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Current Password (Optional to change)</label>
                                <input wire:model.live.debounce.500ms="current_password" id="current_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark-remove:bg-gray-700 dark-remove:border-gray-600 dark-remove:placeholder-gray-400 dark-remove:text-white dark-remove:focus:ring-teal-500 dark-remove:focus:border-teal-500"
                                    type="password" autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">New Password</label>
                                <input wire:model.live.debounce.500ms="new_password" id="new_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark-remove:bg-gray-700 dark-remove:border-gray-600 dark-remove:placeholder-gray-400 dark-remove:text-white dark-remove:focus:ring-teal-500 dark-remove:focus:border-teal-500"
                                    type="password" autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="my-5 bg-gray-100 px-0.5 py-1 rounded-md flex justify-end">
                        <button wire:click="$dispatch('update_profile')" class="bg-gray-800 hover:bg-gray-700 text-gray-100 px-3 py-1 rounded-md">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            
            Livewire.on('profile_updated', (message) => {
                setTimeout(() => {
                    Livewire.dispatch('to_home_screen')
                }, 5000);
            });
        })
    </script>
</div>
