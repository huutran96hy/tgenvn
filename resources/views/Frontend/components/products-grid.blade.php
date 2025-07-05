<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    @php
        $products = [
            ['ko' => '스트레이트 엣지', 'en' => 'Straight Edge', 'vi' => 'Thước thẳng', 'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/446/040/170x130.crop.jpg'],
            ['ko' => '파라렐바', 'en' => 'Parallel Bar', 'vi' => 'Thanh song song', 'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/382/170x130.crop.jpg'],
            ['ko' => '직각정반(삼각)', 'en' => 'Right Angle Plate (Triangle)', 'vi' => 'Bàn vuông góc (tam giác)', 'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/379/170x130.crop.jpg'],
            ['ko' => '직각정반(사각)', 'en' => 'Right Angle Plate (Square)', 'vi' => 'Bàn vuông góc (vuông)', 'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/376/170x130.crop.jpg'],
            ['ko' => '석재 다이얼볼파라미터', 'en' => 'Stone Dial Ball Parameter', 'vi' => 'Thông số bóng quay đá', 'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/269/170x130.crop.jpg'],
            ['ko' => '브이블럭', 'en' => 'V-Block', 'vi' => 'Khối V', 'link' => 'http://tg-enc.co.kr/xe/files/cache/thumbnails/263/170x130.crop.jpg']
        ];
    @endphp

    @foreach($products as $product)
        <div class="product-card bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="h-60 bg-gray-100 flex">
                <img src="{{$product['link'] }}" alt="{{ $product['ko'] }}" class="w-100" />
            </div>
            <div class="p-4">
                <h3 class="text-lg font-medium text-blue-600 text-center" data-ko="{{ $product['ko'] }}" data-en="{{ $product['en'] }}" data-vi="{{ $product['vi'] }}">{{ $product['ko'] }}</h3>
            </div>
        </div>
    @endforeach
</div>
