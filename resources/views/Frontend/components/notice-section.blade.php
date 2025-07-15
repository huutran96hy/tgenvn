
<div class="space-y-6">
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
    <!-- <div class="bg-white rounded-lg shadow-sm">
        <div class="border-b border-gray-200 p-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold text-blue-600" data-ko="공지사항" data-en="Notice" data-vi="Thông báo">공지사항</h3>
                <span class="text-sm text-gray-500">NOTICE</span>
            </div>
        </div>

        <div class="p-4 space-y-3">
            @php
                $notices = [
                    ['date' => '12.10.04', 'ko' => '• 티지이엔씨 홈페이지를 오픈하였습니다.', 'en' => '• TG ENC website has been opened.', 'vi' => '• Website TG ENC đã được mở.'],
                    ['date' => '12.10.02', 'ko' => '• 많은 성원 부탁드립니다.', 'en' => '• Thank you for your support.', 'vi' => '• Cảm ơn sự hỗ trợ của bạn.'],
                    ['date' => '12.10.27', 'ko' => '• 티지이엔씨 홈페이지를 오픈하였습니다.', 'en' => '• TG ENC website has been opened.', 'vi' => '• Website TG ENC đã được mở.'],
                    ['date' => '12.10.22', 'ko' => '• 많은 성원 부탁드립니다.', 'en' => '• Thank you for your support.', 'vi' => '• Cảm ơn sự hỗ trợ của bạn.']
                ];
            @endphp

            @foreach($notices as $index => $notice)
                <div class="flex justify-between items-center py-2 {{ $index < count($notices) - 1 ? 'border-b border-gray-100' : '' }}">
                    <span class="text-sm text-gray-700" data-ko="{{ $notice['ko'] }}" data-en="{{ $notice['en'] }}" data-vi="{{ $notice['vi'] }}">{{ $notice['ko'] }}</span>
                    <span class="text-xs text-gray-500">[{{ $notice['date'] }}]</span>
                </div>
            @endforeach
        </div>
    </div> -->

    <!-- Service Icons -->
    <div class="bg-white p-6 rounded-lg shadow-sm">
        <h4 class="text-lg font-bold text-blue-600 mb-4" data-ko="바로가기" data-en="Quick Links" data-vi="Liên kết nhanh">바로가기</h4>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @php
                $quickLinks = [
                    ['ko' => '사업현황', 'en' => 'Business Status', 'vi' => 'Tình trạng kinh doanh'],
                    ['ko' => '보유장비', 'en' => 'Equipment', 'vi' => 'Thiết bị'],
                    ['ko' => '고객센터', 'en' => 'Customer Center', 'vi' => 'Trung tâm khách hàng'],
                    ['ko' => '오시는길', 'en' => 'Directions', 'vi' => 'Chỉ đường']
                ];
            @endphp

            @foreach($quickLinks as $link)
                <div class="text-center">
                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-2 hover-scale cursor-pointer">
                        <div class="w-6 h-6 bg-gray-400 rounded"></div>
                    </div>
                    <span class="text-xs text-gray-600" data-ko="{{ $link['ko'] }}" data-en="{{ $link['en'] }}" data-vi="{{ $link['vi'] }}">{{ $link['ko'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
