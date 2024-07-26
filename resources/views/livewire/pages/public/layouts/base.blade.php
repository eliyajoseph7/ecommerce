<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/editor.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- flowbite --}}
    <link href="{{ asset('assets/lib/flowbite/flowbite.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/lib/flowbite/flowbite.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="font-sans text-gray-900 antialiased relative" x-data="{ atTop: true }">
    @livewire('pages.public.layouts.header')
    {{-- @livewire('pages.public.cart.cart-items') --}}
    <div
        class="min-h-[72vh] flex flex-col sm:justify-start items-center py-0 sm:pt-0 bg-gray-50 dark:bg-gray-900 pb-5 overflow-x-hidden">
        {{ $slot }}
    </div>
    @livewire('pages.public.layouts.footer')
</body>
@yield('scripts')

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'green',
        customClass: {
            popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
    });
    // document.addEventListener('livewire:init', () => {
    //     Livewire.on('add_item', (data) => {
    //         console.log(data);
    //         Livewire.dispatch('add_to_cart', {
    //             'itemId': data
    //         })
    //     })
    // });

    // $(document).on('click', '.add_to_cart', function() {
    //     Livewire.dispatch('add_to_cart', {
    //         'itemId': 'data'
    //     })
    //     console.log('jjfj');
    // })
</script>

</html>
