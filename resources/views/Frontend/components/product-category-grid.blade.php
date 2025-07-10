<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @foreach($products as $index => $product)
            <div class="product-card bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 cursor-pointer">
                {{-- Image Container with correct aspect ratio --}}
                <div class="bg-gray-50 flex items-center justify-center p-1 border-b border-gray-100 image-container">
                    @if(isset($product['link']))
                        <img
                            src="{{ $product['link'] }}"
                            alt="{{ $product['ko'] }}"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    @elseif(isset($product['image']))
                        <img
                            src="{{ $paroduct['image'] }}"
                            alt="{{ $product['ko'] }}"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    @else
                        {{-- Fallback to icon-based display for products without image links --}}
                        @if($activePage === 'precision' && isset($product['icon']))
                            @include('Frontendcomponents.product-icons.' . $product['icon'])
                        @elseif($activePage === 'custom')
                            <div class="text-center">
                                <div class="w-32 h-20 bg-gradient-to-r from-gray-700 to-gray-900 rounded-lg mx-auto mb-4 relative">
                                    <div class="absolute top-2 left-2 w-4 h-4 bg-blue-400 rounded-full"></div>
                                    <div class="absolute top-2 right-2 w-4 h-4 bg-blue-400 rounded-full"></div>
                                    <div class="absolute bottom-2 left-2 w-4 h-4 bg-blue-400 rounded-full"></div>
                                    <div class="absolute bottom-2 right-2 w-4 h-4 bg-blue-400 rounded-full"></div>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="text-white text-xs font-bold">FOP</span>
                                    </div>
                                </div>
                            </div>
                        @elseif($activePage === 'air-bearing')
                            <div class="text-center">
                                <div class="relative">
                                    <div class="w-32 h-20 bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg mx-auto mb-4 relative">
                                        <!-- Air bearing holes -->
                                        <div class="absolute top-3 left-4 w-2 h-2 bg-white rounded-full"></div>
                                        <div class="absolute top-3 right-4 w-2 h-2 bg-white rounded-full"></div>
                                        <div class="absolute bottom-3 left-4 w-2 h-2 bg-white rounded-full"></div>
                                        <div class="absolute bottom-3 right-4 w-2 h-2 bg-white rounded-full"></div>
                                        <div class="absolute top-3 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-white rounded-full"></div>
                                        <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-white rounded-full"></div>
                                        <!-- Center indicator -->
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="w-4 h-4 bg-yellow-400 rounded-full"></div>
                                        </div>
                                    </div>
                                    <!-- Air flow indicators -->
                                    <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                                        <div class="flex space-x-1">
                                            <div class="w-1 h-3 bg-blue-300 rounded animate-pulse"></div>
                                            <div class="w-1 h-3 bg-blue-300 rounded animate-pulse" style="animation-delay: 0.2s"></div>
                                            <div class="w-1 h-3 bg-blue-300 rounded animate-pulse" style="animation-delay: 0.4s"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- Default placeholder --}}
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <div class="text-center">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="text-sm text-gray-500" data-ko="이미지 준비중" data-en="Image Loading" data-vi="Đang tải hình">이미지 준비중</span>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                {{-- Content Container --}}
                <div class="p-4">
                    <h3
                        class="text-lg font-medium text-blue-600 text-center leading-relaxed"
                        data-ko="{{ $product['ko'] }}"
                        data-en="{{ $product['en'] }}"
                        data-vi="{{ $product['vi'] }}"
                    >
                        {{ $product['ko'] }}
                    </h3>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .product-card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    
    .product-card:hover {
        transform: translateY(-2px);
    }
    
    .product-card img {
        transition: transform 0.3s ease-in-out;
    }
    
    .product-card:hover img {
        transform: scale(1.05);
    }
    
    /* Set aspect ratio for image container */
    .image-container {
        aspect-ratio: 4 / 3;
        width: 100%;
        min-height: 200px;
    }
    
    /* Responsive adjustments */
    @media (min-width: 768px) {
        .image-container {
            min-height: 180px;
        }
    }
    
    @media (min-width: 1024px) {
        .image-container {
            min-height: 200px;
        }
    }
</style>
