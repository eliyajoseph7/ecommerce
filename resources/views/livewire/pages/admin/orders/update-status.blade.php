<div class="p-2">
    <div class="py-4 font-bold">
        <div class="">Change Order <span
                class="bg-sky-50 text-sky-700 pz-2.5 py-0.5 rounded-md">{{ $order->orderno }}</span> status</div>
    </div>
    <form wire:submit.prevent='submit'>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <select wire:model.live="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
            @error('category')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select wire:model.live="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">Select Status</option>
                @foreach ($statuses as $key => $status)
                    <option value="{{ $key }}">{{ $status }}</option>
                @endforeach
            </select>
            @error('status')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="pt-3 w-full">
            <button type="submit" class="bg-sky-900/80 text-white px-2 py-1 rounded-md w-full flex justify-center items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                  </svg>                  
                <span>
                    Change
                </span>
            </button>
        </div>
    </form>
</div>
