<div class="my-8">
    <div class="text-2xl font-bold w-full text-gray-700">Our Services</div>
    <div class="w-36 h-0.5 bg-teal-700"></div>
    <div class="sm:mx-2 md:mx-0 text-center">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @include('livewire.pages.public.home.components.includes.card', [
                'name' => 'Vehicles',
                'image' => 'assets/images/sliders/car.jpg',
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
</div>
