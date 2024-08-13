<div class="w-full">
    <div class="w-full sm:px-2 md:px-32 lg:px-72">
        @include('livewire.pages.public.home.components.slider')
        
    </div>
    <div class="sm:px-2 md:px-32 lg:px-72">
        @include('livewire.pages.public.home.components.services')
    </div>
    <div class="bg-white">
        <div class="sm:px-2 md:px-32 lg:px-72 py-4">
            @livewire('pages.public.home.components.interest.interests')
        </div>

    </div>

    @section('scripts')
    <script>
        $(document).ready(function() {
            Livewire.dispatch('fetch_products')
        });
    </script>
    @endsection
</div>
