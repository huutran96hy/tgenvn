<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:grid lg:grid-cols-4 gap-6">
        @include('Frontendcomponents.about-sidebar', ['activePage' => 'technology'])
        @include('Frontendcomponents.technology-main')
    </div>
</div>
