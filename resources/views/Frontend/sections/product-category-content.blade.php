<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        @include('Frontend.components.products-sidebar-main', ['activePage' => $activePage])
        @include('Frontend.components.product-category-main')
    </div>
</div>
