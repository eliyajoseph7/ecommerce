<div class="bg-gray-50 rounded-md mt-2 p-2">
    <div class="font-bold text-gray-700 py-2">Best selling products</div>
    <div class="h-60 overfolw-x-auto overflow-y-auto">
        <table class="w-full overflow-x-auto">
            <tbody>
                @forelse ($data as $dt)
                    <tr>
                        <td class="">{{ $loop->iteration }}.</td>
                        <td class="">
                            <div class="flex space-x-1">
                                <img src="{{ asset($dt->item->images()->first()->image) }}" class="w-12 h-8 object-cover rounded-md">
                                <div class="text-gray-700">{{ Str::limit($dt->item->name, 20, '...') }}</div>
                            </div>
                        </td>
                        <td class="">{{ round($dt->percentage, 2) }}%</td>
                    </tr>

                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
