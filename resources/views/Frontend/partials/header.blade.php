<header class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('assets/images/logo_width.png') }}" alt="TG-ENC Logo" class="h-16 w-auto">
                </a>
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
