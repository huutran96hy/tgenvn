<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        @include('frontend.components.about-sidebar', ['activePage' => 'greeting'])
        <div class="lg:col-span-3">
            @include('frontend.components.about-main')
        </div>
    </div>
</div>
