<div class="container mx-auto px-4 py-8">
    <div class="grid lg:grid-cols-4 gap-8">
        @include('frontend.components.process-sidebar', ['activePage' => $activePage])
        @include('frontend.components.process-main')
    </div>
</div>
