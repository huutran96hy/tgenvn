<div class="space-y-6">
    <div class="bg-white rounded-lg shadow-sm">
        <div class="border-b border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-blue-600" data-ko="제품정보" data-en="Product Info" data-vi="Thông tin sản phẩm">제품정보</h3>
                <div class="flex items-center text-sm text-gray-500">
                    <span>PRODUCT VIEW</span>
                    <a class="ml-2 text-blue-600 hover:text-blue-800" href="{{ route('products') }}" data-ko="더보기" data-en="View More" data-vi="Xem thêm">
                        MORE →
                    </a>
                </div>
            </div>
        </div>

        <div class="p-4">
            <div class="mb-4">
                <div class="w-full h-58 bg-gray-200 rounded-lg flex items-center justify-center">
                    <img src="{{ asset('assets/images/products/Picture3.png') }}" alt="Product Image" class="max-w-full max-h-full object-cover rounded-lg">
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="font-bold text-blue-600" data-ko="티지이엔씨 제품정보" data-en="TG ENC Product Information" data-vi="Thông tin sản phẩm TG ENC">티지이엔씨 제품정보</h4>
                <p class="text-sm text-gray-600" data-ko="티지이엔씨에서는<br>다양한 제품을<br>판매 및 제작하여 수<br>있습니다." data-en="TG ENC offers<br>various products<br>for sale and<br>manufacturing." data-vi="TG ENC cung cấp<br>các sản phẩm<br>đa dạng để bán<br>và sản xuất.">
                    티지이엔씨에서는<br>
                    다양한 제품을<br>
                    판매 및 제작하여 수<br>
                    있습니다.
                </p>
            </div>
        </div>
    </div>

    <!-- Product Categories -->
    <div class="space-y-2">
        @php
        $categories = [
        ['ko' => '01 규격 정반', 'en' => '01 Standard Surface Plate', 'vi' => '01 Bàn chuẩn', 'bg' => 'bg-gray-800 hover:bg-gray-700','link'=> route('products.general')],
        ['ko' => '02 정밀 측정구', 'en' => '02 Precision Measuring Tools', 'vi' => '02 Dụng cụ đo chính xác', 'bg' => 'bg-gray-700 hover:bg-gray-600','link'=> route('products.precision')],
        ['ko' => '03 고객주문형정반', 'en' => '03 Custom Surface Plate', 'vi' => '03 Bàn tùy chỉnh', 'bg' => 'bg-gray-600 hover:bg-gray-500', 'link'=> route('products.custom')],
        ['ko' => '04 Air Bearing Stage', 'en' => '04 Air Bearing Stage', 'vi' => '04 Air Bearing Stage', 'bg' => 'bg-blue-600 hover:bg-blue-700', 'link'=> route('products.air-bearing')],
        ];
        @endphp

        @foreach($categories as $index => $category)
        <a href="{{ $category['link'] }}" class="block">
            <div class="{{ $category['bg'] }} text-white p-3 {{ $index === 0 ? 'rounded-t-lg' : ($index === count($categories) - 1 ? 'rounded-b-lg' : '') }} cursor-pointer transition-colors">
                <span class="text-sm font-medium" data-ko="{{ $category['ko'] }}" data-en="{{ $category['en'] }}" data-vi="{{ $category['vi'] }}">{{ $category['ko'] }}</span>
            </div>
        </a>
        @endforeach
    </div>
</div>