<div class="bg-gray-50 rounded-md mt-2 p-2">
    <div class="font-bold text-gray-700 py-2">Discounted items</div>
    <div class="h-60 overfolw-x-auto overflow-y-auto relative">
        <div class="text-center absolute top-1/3 left-1/3 text-sky-300 {{ $loading ? '' : 'hidden' }}">
            <i class="fa-solid fa-spinner fa-spin fa-3x"></i>
            <p>Loading...</p>
        </div>
        <table class="w-full overflow-x-auto {{ !$loading ? '' : 'hidden' }}">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Item</td>
                    <td>Discount</td>
                    <td>Days</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $dt)
                    <tr class="">
                        <td class="py-2">{{ $loop->iteration }}.</td>
                        <td class="">
                            <div class="flex space-x-1">
                                <img src="{{ asset($dt->images()->first()->image) }}"
                                    class="w-12 h-8 object-cover rounded-md">
                                <div class="text-gray-700">{{ Str::limit($dt->name, 10, '...') }}</div>
                            </div>
                        </td>
                        <td class="text-center">{{ round($dt->discount->percentage, 2) }}%</td>
                        <td class="">{{ $dt->discount->days_remain_num ?? 'NA' }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4">No record</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
