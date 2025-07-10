@php
    $activePage = $activePage ?? 'general';
    $productCategories = [
        ['route' => 'products.general', 'key' => 'general', 'ko' => '일반정반', 'en' => 'General Surface Plate', 'vi' => 'Bàn chuẩn chung'],
        ['route' => 'products.precision', 'key' => 'precision', 'ko' => '정밀 측정구', 'en' => 'Precision Measuring Tools', 'vi' => 'Dụng cụ đo chính xác'],
        ['route' => 'products.custom', 'key' => 'custom', 'ko' => '주문형 FOP 정반', 'en' => 'Custom FOP Surface Plate', 'vi' => 'Bàn FOP tùy chỉnh'],
        ['route' => 'products.air-bearing', 'key' => 'air-bearing', 'ko' => 'Air Bearing Stage', 'en' => 'Air Bearing Stage', 'vi' => 'Air Bearing Stage']
    ];
@endphp

<div class="w-full lg:col-span-1">
    <!-- Mobile Navigation -->
    <div class="block lg:hidden mb-6">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Mobile Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-3">
                <h3 class="text-white font-bold text-center text-sm">
                    <span data-ko="제품정보" data-en="PRODUCTS INFO" data-vi="THÔNG TIN SẢN PHẨM">제품정보</span>
                </h3>
            </div>
            
            <!-- Mobile Navigation Tabs -->
            <div class="p-3">
                <div class="flex overflow-x-auto space-x-2 pb-2 scrollbar-hide">
                    @foreach($productCategories as $category)
                        <a href="{{ route($category['route']) }}" 
                           class="flex-shrink-0 px-3 py-2.5 rounded-full text-xs font-medium transition-all duration-200 whitespace-nowrap min-w-0 {{ $category['key'] === $activePage ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                            <span data-ko="{{ $category['ko'] }}" data-en="{{ $category['en'] }}" data-vi="{{ $category['vi'] }}">{{ $category['ko'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Mobile Customer Support -->
        @include('Frontend.components.customer-support-mobile')
    </div>

    <!-- Desktop Sidebar -->
    <div class="hidden lg:block space-y-6">
        <!-- Products Information -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="text-center py-6 px-4 bg-gradient-to-b from-gray-50 to-white">
                <h2 class="text-2xl font-bold text-blue-600 mb-2">PRODUCTS</h2>
                <h3 class="text-xl font-light text-blue-400 mb-4">INFORMATION</h3>
                <div class="w-full h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
            </div>
            
            <nav class="pb-4">
                @foreach($productCategories as $category)
                    <a href="{{ route($category['route']) }}" 
                       class="flex items-center px-6 py-3 transition-all duration-200 group {{ $category['key'] === $activePage ? 'text-blue-600 font-medium border-l-4 border-blue-600 bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }}">
                        <span class="w-2 h-2 {{ $category['key'] === $activePage ? 'bg-blue-600' : 'bg-gray-400 group-hover:bg-blue-500' }} rounded-full mr-3 flex-shrink-0 transition-colors duration-200"></span>
                        <span data-ko="{{ $category['ko'] }}" data-en="{{ $category['en'] }}" data-vi="{{ $category['vi'] }}">{{ $category['ko'] }}</span>
                    </a>
                @endforeach
            </nav>
        </div>

        @include('Frontend.components.customer-support')
    </div>
</div>
