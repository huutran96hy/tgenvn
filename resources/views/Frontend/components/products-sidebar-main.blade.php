@php
$activePage = $activePage ?? 'general';
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
                    <a href="{{ route('products.general') }}"
                        class="flex-shrink-0 px-3 py-2.5 rounded-full text-xs font-medium transition-all duration-200 whitespace-nowrap min-w-0 {{ 'general' === $activePage ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                        <span data-ko="일반정반" data-en="General Surface Plate" data-vi="Bàn chuẩn chung">일반정반</span>
                    </a>
                    @foreach($productCategories as $category)
                    <a href="{{ route('products.category', ['category' => $category['slug']]) }}"
                        class="flex-shrink-0 px-3 py-2.5 rounded-full text-xs font-medium transition-all duration-200 whitespace-nowrap min-w-0 {{ $category['slug'] === $activePage ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
                        <span data-ko="{{ $category['category_name_ko'] }}" data-en="{{ $category['category_name_en'] }}" data-vi="{{ $category['category_name_vi'] }}">{{ $category['category_name_ko'] }}</span>
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
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-1 py-1 text-center">
                <h2 class="text-2xl font-bold text-white mb-1">PRODUCTS</h2>
                <h3 class="text-xl font-light text-white mb-0">INFORMATION</h3>
                <div class="w-full h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
            </div>

            <nav class="pb-4">
                 <a href="{{ route('products.general') }}"
                    class="flex items-center px-6 py-3 transition-all duration-200 group {{ 'general' === $activePage ? 'text-blue-600 font-medium border-l-4 border-blue-600 bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }}">
                    <span class="w-2 h-2 {{ $category['key'] === $activePage ? 'bg-blue-600' : 'bg-gray-400 group-hover:bg-blue-500' }} rounded-full mr-3 flex-shrink-0 transition-colors duration-200"></span>
                    <span data-ko="일반정반" data-en="General Surface Plate" data-vi="Bàn chuẩn chung">일반정반</span>
                </a>
                @foreach($productCategories as $category)
                <a href="{{ route('products.category', ['category' => $category['slug']]) }}"
                    class="flex items-center px-6 py-3 transition-all duration-200 group {{ $category['slug'] === $activePage ? 'text-blue-600 font-medium border-l-4 border-blue-600 bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50' }}">
                    <span class="w-2 h-2 {{ $category['key'] === $activePage ? 'bg-blue-600' : 'bg-gray-400 group-hover:bg-blue-500' }} rounded-full mr-3 flex-shrink-0 transition-colors duration-200"></span>
                    <span data-ko="{{ $category['category_name_ko'] }}" data-en="{{ $category['category_name_en'] }}" data-vi="{{ $category['category_name_vi'] }}">{{ $category['category_name_ko'] }}</span>
                </a>
                @endforeach
            </nav>
        </div>

        @include('Frontend.components.customer-support')
    </div>
</div>