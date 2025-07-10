<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        @include('Frontend.components.about-sidebar', ['activePage' => 'directions'])
        @include('Frontend.components.directions-main')
    </div>
</div>
