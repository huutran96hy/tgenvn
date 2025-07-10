<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        @include('Frontendcomponents.products-sidebar-main', ['activePage' => 'general'])
        <div class="lg:col-span-3">
            @include('Frontendcomponents.general-surface-plate-main')
        </div>
    </div>
</div>
