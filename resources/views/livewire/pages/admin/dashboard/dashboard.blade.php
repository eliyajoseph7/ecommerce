<div class="mt-4 md:mt-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        <div class="">
            @livewire('pages.admin.dashboard.components.stats.total-sales')
            @livewire('pages.admin.dashboard.components.best-selling-items')
        </div>
        <div class="">
            @livewire('pages.admin.dashboard.components.stats.system-visits')
            @livewire('pages.admin.dashboard.components.order-summary')
            
            <div class="bg-gray-50 mt-2">
                <div class="">New vs. Returning Customers</div>
            </div>
        </div>
        @livewire('pages.admin.dashboard.components.item-view-trend')
        <div class="bg-gray-50">
            <div class="">Best selling categories</div>
        </div>
        <div class="bg-gray-50">
            <div class="">Discounted items</div>
        </div>
    </div>
</div>
