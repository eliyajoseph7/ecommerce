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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- flowbite --}}
        <link href="{{ asset('assets/lib/flowbite/flowbite.min.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/lib/flowbite/flowbite.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <style>
            input {
                border-color: red !important;
                border: 0px !important;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @livewire('pages.public.layouts.header')
        <div class="min-h-[70vh] flex flex-col sm:justify-start items-center py-0 sm:pt-0 bg-gray-50 dark:bg-gray-900 pb-5 overflow-x-hidden">
            {{ $slot }}
        </div>
        @livewire('pages.public.layouts.footer')
    </body>
    @yield('scripts')
</html>
