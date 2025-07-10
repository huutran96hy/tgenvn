<header class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="text-3xl font-bold">
                    <span class="text-blue-600">TG</span>
                    <span class="text-blue-400 ml-2">ENC</span>
                </div>
                <div class="text-xs text-gray-500 ml-2 hidden sm:block">Precision Granite Stage Technology</div>
            </div>

            <!-- Desktop Navigation -->
            @include('Frontend.partials.navigation')

            <!-- Language Selector & Mobile Menu Button -->
            <div class="flex items-center space-x-4">
                @include('Frontend.partials.language-selector')

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>

    @include('Frontend.partials.mobile-menu')
</header>
