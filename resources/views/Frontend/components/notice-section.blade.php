<div class="space-y-6">
    <div class="space-y-2">
        @php
        $categories = [
        ['ko' => '01 규격 정반', 'en' => '01 Standard Surface Plate', 'vi' => '01 Bàn chuẩn', 'bg' => 'bg-gray-800 hover:bg-gray-700','link'=> route('products.general')],
        ['ko' => '02 정밀 측정구', 'en' => '02 Precision Measuring Tools', 'vi' => '02 Dụng cụ đo chính xác', 'bg' => 'bg-gray-700 hover:bg-gray-600','link'=> route('products.category', ['category' => 'precision-measuring-tools'])],
        ['ko' => '03 고객주문형정반', 'en' => '03 Custom Surface Plate', 'vi' => '03 Bàn tùy chỉnh', 'bg' => 'bg-gray-600 hover:bg-gray-500', 'link'=> route('products.category', ['category' => 'custom-fdp-surface-plate'])],
        ['ko' => '04 Air Bearing Stage', 'en' => '04 Air Bearing Stage', 'vi' => '04 Air Bearing Stage', 'bg' => 'bg-blue-600 hover:bg-blue-700', 'link'=> route('products.category', ['category' => 'air-bearing-stage'])],
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
        <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">
            @php
            $quickLinks = [
            [
            'ko' => '사업안내',
            'en' => 'Business Information',
            'vi' => 'Giới thiệu doanh nghiệp',
            'icon' => 'chart',
            'link' => route('about')

            ],
            
            [
            'ko' => '견적의뢰',
            'en' => 'Quote',
            'vi' => 'Báo giá',
            'icon' => 'phone',
            'link' => route('quote')
            ],
            [
            'ko' => '오시는길',
            'en' => 'Directions',
            'vi' => 'Chỉ đường',
            'icon' => 'location',
            'link' => route('about.directions')
            ]
            ];
            @endphp

            @foreach($quickLinks as $link)
            <div class="text-center">
                <a href="{{ $link['link'] ?? '#' }}" class="group">
                    <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-3 hover:bg-blue-100 transition-colors cursor-pointer group">
                        @if($link['icon'] === 'chart')
                        <!-- Business Status - Bar Chart Icon -->
                        <svg class="w-6 h-6 text-blue-500 group-hover:text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 13h2v8H3v-8zm4-6h2v14H7V7zm4-4h2v18h-2V3zm4 8h2v10h-2v-10zm4-4h2v14h-2V7z" />
                        </svg>
                        @elseif($link['icon'] === 'tools')
                        <!-- Equipment - Tools Icon -->
                        <svg class="w-6 h-6 text-blue-500 group-hover:text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.4 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.3-2.3c.5-.4.5-1.1.1-1.4z" />
                            <path d="M14.5 6.5L17 4l3 3-2.5 2.5" />
                        </svg>
                        @elseif($link['icon'] === 'phone')
                        <!-- Customer Center - Phone Icon -->
                        <svg class="w-6 h-6 text-blue-500 group-hover:text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            <path d="M19 12h2c0-4.97-4.03-9-9-9v2c3.87 0 7 3.13 7 7z" />
                            <path d="M15 12h2c0-2.76-2.24-5-5-5v2c1.66 0 3 1.34 3 3z" />
                        </svg>
                        @elseif($link['icon'] === 'location')
                        <!-- Directions - Location Pin Icon -->
                        <svg class="w-6 h-6 text-blue-500 group-hover:text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        @endif
                    </div>
                    <span class="text-sm text-gray-600 font-medium" data-ko="{{ $link['ko'] }}" data-en="{{ $link['en'] }}" data-vi="{{ $link['vi'] }}">{{ $link['ko'] }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>