<div class="mt-4 md:mt-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2">
        <div class="">
            @livewire('pages.admin.dashboard.components.stats.total-sales')
            @livewire('pages.admin.dashboard.components.best-selling-items')
            <div class="mt-2">
                @livewire('pages.admin.dashboard.components.customer-summary')
            </div>
        </div>
        <div class="">
            @livewire('pages.admin.dashboard.components.stats.system-visits')
            @livewire('pages.admin.dashboard.components.order-summary')
            
            <div class="mt-2">
                @livewire('pages.admin.dashboard.components.discounted-items')
            </div>
        </div>
        @livewire('pages.admin.dashboard.components.best-selling-categories')
        @livewire('pages.admin.dashboard.components.item-view-trend')
        
    </div>
</div>
