<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        @include('Frontend.components.products-sidebar-main', ['activePage' => 'general'])
        @include('Frontend.components.general-surface-plate-main')
    </div>
</div>
