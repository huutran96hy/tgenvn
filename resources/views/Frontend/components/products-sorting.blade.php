<div class="flex flex-wrap gap-2 mb-6">
    @php
        $sortOptions = [
            ['key' => 'all', 'ko' => '조회 수 ', 'en' => 'View All', 'vi' => 'Xem tất cả', 'active' => false],
            ['key' => 'popular', 'ko' => '추천 수', 'en' => 'Popular', 'vi' => 'Phổ biến', 'active' => false],
            ['key' => 'blames', 'ko' => '비추천 수', 'en' => 'Blames', 'vi' => 'Blames', 'active' => true],
            ['key' => 'date', 'ko' => '날짜', 'en' => 'Date', 'vi' => 'Ngày gửi', 'active' => false],
            ['key' => 'updated', 'ko' => '최근 수정일', 'en' => 'Last Updated', 'vi' => 'Cập nhật cuối', 'active' => false]
        ];
    @endphp

    @foreach($sortOptions as $option)
        <button class="sort-btn px-4 py-2 {{ $option['active'] ? 'bg-blue-100 text-blue-700 active' : 'bg-gray-200 text-gray-700' }} rounded hover:bg-{{ $option['active'] ? 'blue' : 'gray' }}-300 transition-colors flex items-center" data-sort="{{ $option['key'] }}">
            <span data-ko="{{ $option['ko'] }}" data-en="{{ $option['en'] }}" data-vi="{{ $option['vi'] }}">{{ $option['ko'] }}</span>
            <svg class="sort-arrow w-3 h-3 ml-1 {{ $option['active'] ? 'opacity-100' : 'opacity-0' }} transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>
    @endforeach
</div>
