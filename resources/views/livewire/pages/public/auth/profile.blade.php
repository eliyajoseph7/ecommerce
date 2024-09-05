<div class="w-full z-10">
    <div class="px-2 md:px-32 lg:px-72">
        <div class="grid sm:grid-cols-1 lg:grid-cols-12 gap-2 py-4 relative">
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
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('order_completed', (message) => {
                Toast.fire({
                    icon: 'success',
                    title: 'Order submitted successfully',
                    text: 'Check your email for more details.',
                });

                setTimeout(() => {
                    Livewire.dispatch('to_order_screen')
                }, 5000);
            })
        })
    </script>
</div>
