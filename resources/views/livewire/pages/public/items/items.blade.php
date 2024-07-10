<div class="w-full">
    <div class="w-full sm:px-2 md:px-32 lg:px-72">
        <div class="pt-8 font-bold text-2xl text-gray-700">
            {{ $qs->name }}
        </div>
        <div class="text-gray-400 py-2 flex space-x-1 border-b border-gray-300/70">
            <a class="pr-1 hover:text-teal-700" href="{{ route('home') }}">Home</a>/
            @if ($context['level'] == 2)
                <a class="pr-1 hover:text-teal-700"
                    href="{{ route('public_items', $context['category']['slug']) }}">{{ $context['category']['name'] }}</a>/
            @endif
            {{-- <a class="pr-1 hover:text-teal-700"
                href="{{ route('public_items', $context['sub_category']['slug']) }}">{{ $context['sub_category']['name'] }}</a>/ --}}
            <p>{{ $qs->name }}</p>
        </div>
        <div class="py-4">
            <div class="grid sm:grid-cols-1 md:grid-cols-12 gap-1">
                <div class="md:col-span-2">
                    @forelse ($context['sub_categories'] as $dt)
                        <div class="py-1 font-bold text-sm text-gray-800">
                            <a href="{{ route('public_items', $dt->slug) }}">{{ $dt->name }}</a>
                        </div>
                    @empty
                    @endforelse
                    <div class="mt-8 bg-gray-200/50 px-2 py-2 rounded-md">
                        <div class="border-b border-gray-300 text-gray-400">Product Filters</div>
                        <div class="py-4">
                            <div class="font-bold">Price</div>
                            <div class="flex space-x-2 items-center">
                                <div class="">
                                    <div class="text-gray-500">Tsh.</div>
                                    <input type="text" wire:model.live="selectedMinPrice"
                                        class="w-full px-0.5 text-left !border-gray-300 rounded-md focus:border-sky-700">
                                </div>
                                <div class="text-gray-500 mt-6">-</div>
                                <div class="">
                                    <div class="text-gray-500">Tsh.</div>
                                    <input type="text" wire:model.live="selectedMaxPrice"
                                        class="w-full px-0.5 text-left !border-gray-300 rounded-md focus:border-sky-700">
                                </div>
                            </div>
                            <div class="py-6">
                                <section class="range-slider">
                                    <span class="output outputOne"></span>
                                    <span class="output outputTwo"></span>
                                    <span class="full-range"></span>
                                    <span wire:ignore>
                                        <span class="incl-range"></span>

                                    </span>
                                    <input name="rangeOne" value="{{ $selectedMinPrice }}" min="{{ $minPrice }}"
                                        max="{{ $maxPrice }}" step="1" type="range">
                                    <input name="rangeTwo" value="{{ $selectedMaxPrice }}" min="{{ $minPrice }}"
                                        max="{{ $maxPrice }}" step="1" type="range">
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-10 bg-red-50/10">
                    @livewire('pages.public.items.item-display')
                </div>
            </div>
        </div>
    </div>
    <script>
        var rangeOne = document.querySelector('input[name="rangeOne"]'),
            rangeTwo = document.querySelector('input[name="rangeTwo"]'),
            outputOne = document.querySelector('.outputOne'),
            outputTwo = document.querySelector('.outputTwo'),
            inclRange = document.querySelector('.incl-range'),
            updateView = function() {
                if (this.getAttribute('name') === 'rangeOne') {
                    // outputOne.innerHTML = this.value;
                    outputOne.style.left = this.value / this.getAttribute('max') * 100 + '%';
                    Livewire.dispatch('set_selected_min_price', {
                        'value': this.value
                    })
                } else {
                    outputTwo.style.left = this.value / this.getAttribute('max') * 100 + '%';
                    // outputTwo.innerHTML = this.value
                    Livewire.dispatch('set_selected_max_price', {
                        'value': this.value
                    })
                }
                if (parseInt(rangeOne.value) > parseInt(rangeTwo.value)) {
                    inclRange.style.width = (rangeOne.value - rangeTwo.value) / this.getAttribute('max') * 100 + '%';
                    inclRange.style.left = rangeTwo.value / this.getAttribute('max') * 100 + '%';
                } else {
                    inclRange.style.width = (rangeTwo.value - rangeOne.value) / this.getAttribute('max') * 100 + '%';
                    inclRange.style.left = rangeOne.value / this.getAttribute('max') * 100 + '%';
                }
            };

        document.addEventListener('DOMContentLoaded', function() {
            updateView.call(rangeOne);
            updateView.call(rangeTwo);
            $('input[type="range"]').on('mouseup', function() {
                this.blur();
            }).on('mousedown input', function() {
                updateView.call(this);
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Runs immediately after Livewire has finished initializing
            Livewire.dispatch('call_filter');
        })
    </script>
</div>
