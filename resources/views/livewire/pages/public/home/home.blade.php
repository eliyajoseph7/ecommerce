<div class="w-full">
    <div class="w-full px-2 md:px-32 lg:px-72">
        @include('livewire.pages.public.home.components.slider')
        
    </div>
    <div class="px-2 md:px-32 lg:px-72">
        @include('livewire.pages.public.home.components.services')
    </div>
    <div class="bg-white">
        <div class="px-2 md:px-32 lg:px-72 py-4">
            @livewire('pages.public.home.components.interest.interests')
        </div>

    </div>

    @section('scripts')
    <script>
        $(document).ready(function() {
            Livewire.dispatch('fetch_newest_products')
        });
    </script>
    @endsection
</div>
