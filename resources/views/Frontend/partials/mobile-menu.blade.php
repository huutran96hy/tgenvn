<!-- Mobile Menu -->
<div id="mobileMenu" class="mobile-menu lg:hidden fixed top-0 left-0 w-full h-full bg-white z-40">
    <div class="flex flex-col h-full">
        <!-- Mobile Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <div class="text-2xl font-bold">
                <span class="text-blue-600">TG</span>
                <span class="text-blue-400 ml-2">ENC</span>
            </div>
            <button id="closeMobileMenu" class="p-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="flex-1 px-4 py-6">
            <div class="space-y-4">
                <a href="{{ route('about') }}" class="block py-3 text-lg text-gray-700 hover:text-blue-600 border-b border-gray-100 transition-colors" data-ko="회사소개" data-en="About Us" data-vi="Giới thiệu">회사소개</a>
                <a href="{{ route('products') }}" class="block py-3 text-lg text-gray-700 hover:text-blue-600 border-b border-gray-100 transition-colors" data-ko="제품안내" data-en="Products" data-vi="Sản phẩm">제품안내</a>
                <a href="{{ route('process') }}" class="block py-3 text-lg text-gray-700 hover:text-blue-600 border-b border-gray-100 transition-colors" data-ko="생산공정" data-en="Process" data-vi="Quy trình">생산공정</a>
                <a href="{{ route('quote') }}" class="block py-3 text-lg text-gray-700 hover:text-blue-600 border-b border-gray-100 transition-colors" data-ko="견적의뢰" data-en="Quote" data-vi="Báo giá">견적의뢰</a>
            </div>
        </nav>

        <!-- Mobile Language Selector -->
        <div class="p-4 border-t border-gray-200">
            <div class="grid grid-cols-3 gap-2">
                <button class="mobile-lang-btn flex items-center justify-center space-x-1 px-3 py-2 bg-blue-600 text-white rounded-lg text-sm" data-lang="ko">
                    <span class="flag-icon flag-kr"></span>
                    <span>한국어</span>
                </button>
                <button class="mobile-lang-btn flex items-center justify-center space-x-1 px-3 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm" data-lang="en">
                    <span class="flag-icon flag-us"></span>
                    <span>English</span>
                </button>
                <button class="mobile-lang-btn flex items-center justify-center space-x-1 px-3 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm" data-lang="vi">
                    <span class="flag-icon flag-vn"></span>
                    <span>Việt</span>
                </button>
            </div>
        </div>
    </div>
</div>