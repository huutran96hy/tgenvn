@php
    $activePage = $activePage ?? 'general';
    $productCategories = [
        ['route' => 'products.general', 'key' => 'general', 'ko' => '일반정반', 'en' => 'General Surface Plate', 'vi' => 'Bàn chuẩn chung'],
        ['route' => 'products.precision', 'key' => 'precision', 'ko' => '정밀 측정구', 'en' => 'Precision Measuring Tools', 'vi' => 'Dụng cụ đo chính xác'],
        ['route' => 'products.custom', 'key' => 'custom', 'ko' => '주문형 FOP 정반', 'en' => 'Custom FOP Surface Plate', 'vi' => 'Bàn FOP tùy chỉnh'],
        ['route' => 'products.air-bearing', 'key' => 'air-bearing', 'ko' => 'Air Bearing Stage', 'en' => 'Air Bearing Stage', 'vi' => 'Air Bearing Stage']
    ];
@endphp

<div class="lg:col-span-1">
    <!-- Products Information -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
        <div class="text-center py-6 px-4">
            <h2 class="text-2xl font-bold text-blue-600 mb-2">PRODUCTS</h2>
            <h3 class="text-xl font-light text-blue-400 mb-4">INFORMATION</h3>
            <div class="w-full h-1 bg-gray-300 mb-6"></div>
        </div>
        <nav class="pb-4">
            @foreach($productCategories as $category)
                <a href="{{ route($category['route']) }}" class="flex items-center px-6 py-3 {{ $category['key'] === $activePage ? 'text-blue-600 font-medium border-l-4 border-blue-600 bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors' }}">
                    <span class="w-2 h-2 {{ $category['key'] === $activePage ? 'bg-blue-600' : 'bg-gray-400' }} rounded-full mr-3"></span>
                    <span data-ko="{{ $category['ko'] }}" data-en="{{ $category['en'] }}" data-vi="{{ $category['vi'] }}">{{ $category['ko'] }}</span>
                </a>
            @endforeach
        </nav>
    </div>

    @include('frontend.components.customer-support')
</div>
