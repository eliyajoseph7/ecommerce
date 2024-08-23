<div>
    <x-slot name="header">
        @include('includes.breadcrumb', [
            'main' => '',
            'menu' => 'Order Management',
        ])
    </x-slot>
    <div>
        <div class="py-0">
            <div class="max-w-full mx-auto sm:px-6 lg:px-0">
                <div class="w-full pt-3">
                    <div class="flex flex-col-reverse md:flex-row md:space-x-3">
                        <div
                            class="min-h-[20vh] dark:bg-gray-800 overflow-hidden sm:rounded-lg items-center w-full float-right">

                            <div class="bg-gray-50 shadow-lg border-t-2 border-gray-100 rounded-lg px-2 py-3">
                                <div class="flex items-center justify-between d p-4 dark:bg-gray-700">
                                    <div class="flex">
                                        <div class="relative w-full">
                                            <input type="text" wire:model.live.debounce.300ms="search"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                                placeholder="Search" required="">
                                        </div>
                                    </div>
                                    <div class="">
                                        {{-- <button wire:click="exportExcel"
                                        class="flex space-x-1 items-center text-green-500 bg-gray-50 hover:bg-grey-100 hover:text-green-700 px-3 py-0.5 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>
                                                <span>Export Excel</span>
                                        </button> --}}
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table
                                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400 dark:bg-gray-700">
                                        <thead
                                            class="text-md text-gray-700 dark:text-gray-100 bg-gray-100 dark:bg-gray-800">
                                            <tr>
                                                <th scope="col" class="px-4 py-3 w-[50px]">S/No.</th>
                                                @include('includes.table-header-sort', [
                                                    'name' => 'orderno',
                                                    'displayName' => 'Order No.',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'order_date',
                                                    'displayName' => 'Date',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'customer_id',
                                                    'displayName' => 'Customer',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'status',
                                                    'displayName' => 'Order Status',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'total_amount',
                                                    'displayName' => 'Order Amount',
                                                ])
                                                @include('includes.table-header-sort', [
                                                    'name' => 'payment_status',
                                                    'displayName' => 'Payment Status',
                                                ])
                                                <th scope="col" class="px-4 py-3 w-[100px] float-end">
                                                    <span class="sr-only">Actions</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="[&>*:nth-child(even)]:bg-[#F6F9FF] [&>*:nth-child(even)]:dark:bg-gray-600">
                                            @forelse ($data as $dt)
                                                <tr wire:key="{{ $dt->id }}"
                                                    class="border-b border-gray-100 dark:border-gray-700">
                                                    <th scope="row"
                                                        class="px-4 py-3 w-[50px] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $loop->iteration }}</th>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ $dt->orderno }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ $dt->order_date->format('M d, Y') }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        {{ $dt->customer?->full_name }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        <span class="">{!! $dt->order_status !!}</span>
                                                    </td>
                                                    <td class="px-4 py-3 whitespace-nowrap text-right">
                                                        {{ number_format($dt->total_amount) }}</td>
                                                    <td class="px-4 py-3 whitespace-nowrap">
                                                        <span class="">{!! $dt->order_payment !!}</span>    
                                                    </td>
                                                    <td class="px-4 py-3 flex items-center justify-end space-x-1">
                                                        <a title="View Order"
                                                            href="{{ route('order_view', $dt->id) }}"
                                                            class="px-1 bg-gray-300 hover:bg-blue-700 text-white rounded">
                                                            <i class="fas fa-eye"></i></a>

                                                        <button title="Delete"
                                                            wire:click="$dispatch('confirm_delete', {{ $dt->id }})"
                                                            class="px-2.5 bg-gray-300 hover:bg-red-500 text-white rounded">x</button>

                                                        <button title="Change Status"
                                                        wire:click="$dispatch('openModal', { component: 'pages.admin.orders.update-status', arguments: { id: {{ $dt->id }} }})"
                                                        class="px-0 bg-gray-300 hover:bg-green-500 text-white rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                                              </svg>
                                                                                                                          
                                                        </button>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="bg-gray-50">
                                                    <td class="py-2" colspan="50">
                                                        <div class="flex justify-center">There is nothing currently
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>

                                @include('includes.table_pages', [
                                    'data' => $data,
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @if (session()->has('info'))
        <script>
            document.addEventListener('livewire:init', () => {
                Toast.fire({
                    icon: '{{ session('info.type') }}',
                    title: '{{ session('info.message') }}',
                });
            })
        </script>
    @endif
    <script data-navigate-once>
        document.addEventListener('livewire:init', () => {
            // delete
            Livewire.on('confirm_delete', (id) => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete_order', {
                            'id': id
                        });
                    }
                });
            });
        })
    </script>
</div>
