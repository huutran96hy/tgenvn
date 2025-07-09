<div class="container mx-auto px-4 py-8">
    <div class="grid lg:grid-cols-4 gap-8">
        @include('frontend.components.products-sidebar-main', ['activePage' => $activePage])
        @include('frontend.components.product-category-main')
    </div>
</div>
