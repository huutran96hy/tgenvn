<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        @include('frontend.components.support-sidebar', ['activePage' => 'consultation'])
        <div class="lg:col-span-3">
            @include('frontend.components.support-main')
        </div>
    </div>
</div>
