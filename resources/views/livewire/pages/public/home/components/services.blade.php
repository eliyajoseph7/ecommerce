<div class="my-8 sm:mx-2 md:mx-0 text-center">
    <div class="md:flex md:flex-wrap">
        @include('livewire.pages.public.home.components.includes.card', [
            'name' => 'Vehicles',
            'image' => "assets/images/sliders/car.jpg",
            'route' => '#',
        ])
        @include('livewire.pages.public.home.components.includes.card', [
            'name' => 'Houses',
            'image' => 'assets/images/sliders/house.avif',
            'route' => '#',
        ])
        @include('livewire.pages.public.home.components.includes.card', [
            'name' => 'Plots',
            'image' => 'assets/images/sliders/plot.webp',
            'route' => '#',
        ])
        @include('livewire.pages.public.home.components.includes.card', [
            'name' => 'Machinery',
            'image' => 'assets/images/sliders/drone.jpg',
            'route' => '#',
        ])
    </div>
</div>