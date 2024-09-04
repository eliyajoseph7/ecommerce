<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ejtz') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" data-turbolinks-track="true"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @livewire('wire-elements-modal')

</head>

<body class="font-sans antialiased w-screen overflow-x-hidden">
    <div
        class="relative min-h-screen bg-dots-darker bg-center bg-white dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white overflow-x-hidden bg -[url('{{ asset('assets/images/bg.jpg') }}')] bg-cover bg-blend-overlay">
        <livewire:layouts.admin.nav />
        @include('livewire.layouts.admin.sidenav')


        <div class="p-4 sm:ml-64 mt-16 md:mt-0">
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                type="button"
                class="inline-flex items-center p-2 text-sm text-gray-700 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
            <!-- Page Heading -->
            @if (isset($header))
                <header
                    class="bg-gray-50 flex justify-between z-30 mt-4 md:mt-20 rounded-lg border-l border-blue-400  pr-2 relative">
                    <div class="absolute -left-3 bottom-0 -top-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-16 h-16 text-blue-100">
                            <path fill-rule="evenodd"
                                d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="mx-a uto px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            {{ $slot }}
        </div>
    </div>



</body>

{{-- <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
{{-- Highchart --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- optional -->
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://cdn.tiny.cloud/1/9kwmev7of6r1gwfblgyke70ptjc8153as3hzygkrfa2kc91n/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
      plugins: 'code table lists',
      toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
  </script>

<script data-navigate-once>
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

    document.addEventListener('DOMContentLoaded', () => {
        $('.select2').select2({
            minimumResultsForSearch: 6,
            placeholder: "select...",
        });
        // console.log('loaded')
    });

    Livewire.on('initialize_select2', () => {
        $('.select2').select2({
            minimumResultsForSearch: 6,
            placeholder: "select...",
        });

        // console.log('dsfsdfsdfsdf');
        // const datepickerEl = document.getElementsByClassName('datepicker');
        // new Datepicker(datepickerEl, {
        //     // options
        // });
    })
</script>
<script data-navigate-once>
    document.addEventListener('livewire:init', () => {
        // add
        Livewire.on('success', (message) => {
            Toast.fire({
                icon: 'success',
                title: message,
            });
        });

        Livewire.on('field_required', (message) => {
            Toast.fire({
                icon: 'error',
                title: message,
                iconColor: 'red'
            });
        });

        Livewire.on('record_deleted', () => {
            Toast.fire({
                icon: 'success',
                title: 'Record deleted successfully!',
            });
        });

        Livewire.on('warning', (message) => {
            Toast.fire({
                icon: "warning",
                title: message,
                // timer: 1500,
            });
        });

        Livewire.on('error', (message) => {
            Toast.fire({
                icon: 'error',
                title: message,
                iconColor: 'red'
            });
        });

    });
</script>

</html>
