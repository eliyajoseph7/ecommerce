<div class="w-full">
    <div class="w-full sm:px-2 lg:px-72">
        @include('livewire.pages.public.home.components.slider')

    </div>
    <div class="sm:px-2 lg:px-72">
        @include('livewire.pages.public.home.components.services')
    </div>
    <div class="p-5 bg-white min-h-72 border-t-8 border-red-500">
        @livewire('pages.public.home.components.offer')
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
