<div class="w-full">
    <div class="w-full sm:px-2 lg:px-72">
        @include('livewire.pages.public.home.components.slider')

    </div>
    <div class="sm:px-2 lg:px-72">
        @include('livewire.pages.public.home.components.services')
    </div>
    <div class="p-5 bg-white min-h-72 border-t-8 border-red-500">
        <div class="sm:px-2 lg:px-72 py-5">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <div class="bg-gra y-200 rounded-full p-2">
                    <img src="{{ asset('assets/images/special-offer.jpg') }}" class="min-h-40">
                </div>
                <div class="col-span-3">
                    <div class="relative w-full">
                        <!-- Left Arrow -->
                        <button id="scroll-left"
                            class="absolute -left-3 top-1/2 transform -translate-y-1/2 rounded-full bg-gray-100/80 text-sky-800 p-2 z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                              </svg>                              
                        </button>

                        <!-- Scrollable Container -->
                        <div id="scroll-container" class="flex space-x-4 overflow-x-scroll no-scrollbar">
                            <div class="w-full md:w-96 min-h-48 bg-gray-50 rounded-md flex-shrink-0">
                                
                            </div>
                        </div>

                        <!-- Right Arrow -->
                        <button id="scroll-right"
                            class="absolute -right-3 top-1/2 transform -translate-y-1/2 rounded-full bg-gray-100/80 text-sky-800 p-2 z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                              </svg>                              
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="sm:px-2 lg:px-72 py-4">
            @livewire('pages.public.home.components.interest.interests')
        </div>

    </div>

    @section('scripts')
        <script>
            $(document).ready(function() {
                Livewire.dispatch('fetch_products')
            });
        </script>
        <!-- Add this script for arrow functionality -->
        <script>
            const scrollContainer = document.getElementById('scroll-container');
            const scrollLeft = document.getElementById('scroll-left');
            const scrollRight = document.getElementById('scroll-right');
    
    
            function checkOverflow() {
                // Check if the container is overflowing
                if (scrollContainer.scrollWidth > scrollContainer.clientWidth) {
                    scrollLeft.classList.remove('hidden');
                    scrollRight.classList.remove('hidden');
                } else {
                    scrollLeft.classList.add('hidden');
                    scrollRight.classList.add('hidden');
                }
            }
    
            scrollLeft.addEventListener('click', () => {
                scrollContainer.scrollBy({
                    left: -300, // Adjust scroll amount as needed
                    behavior: 'smooth'
                });
            });
    
            scrollRight.addEventListener('click', () => {
                scrollContainer.scrollBy({
                    left: 300, // Adjust scroll amount as needed
                    behavior: 'smooth'
                });
            });
    
            // Listen for scrolling to update the arrow visibility
            scrollContainer.addEventListener('scroll', checkOverflow);
    
            // Run on page load to check initial state
            window.addEventListener('load', checkOverflow);
            window.addEventListener('resize', checkOverflow); // Handle window resize
        </script>
    @endsection
</div>
