<div class="py-8">
    <div class="text-2xl font-bold w-full">You may be interested</div>
    <div class="w-36 h-0.5 bg-gray-200"></div>

    <div class="py-4">
        <div class="mb-4 border-b border-gray-50 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="newest-tab"
                        data-tabs-target="#newest" type="button" role="tab" aria-controls="newest"
                        aria-selected="false">Newest</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="popular-tab" data-tabs-target="#popular" type="button" role="tab"
                        aria-controls="popular" aria-selected="false">Popular</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="materials-tab" data-tabs-target="#materials" type="button" role="tab"
                        aria-controls="materials" aria-selected="false">Materials</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="newest" role="tabpanel"
                aria-labelledby="newest-tab">
                @livewire('pages.public.home.components.interest.components.newest')
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="popular" role="tabpanel"
                aria-labelledby="popular-tab">
                @livewire('pages.public.home.components.interest.components.popular')
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="materials" role="tabpanel"
                aria-labelledby="materials-tab">
                @livewire('pages.public.home.components.interest.components.materials')
            </div>
        </div>

    </div>
</div>
