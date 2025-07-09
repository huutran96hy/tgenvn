@php
    $activePage = $activePage ?? 'greeting';
    $companyCategories = [
        ['route' => 'about.greeting', 'key' => 'greeting', 'ko' => '인사말', 'en' => 'Greeting', 'vi' => 'Lời chào'],
        ['route' => 'about.technology', 'key' => 'technology', 'ko' => '제조기술현황', 'en' => 'Technology Status', 'vi' => 'Tình trạng công nghệ'],
        ['route' => 'about.directions', 'key' => 'directions', 'ko' => '찾아오시는 길', 'en' => 'Directions', 'vi' => 'Chỉ đường']
    ];
@endphp

<div class="lg:col-span-1">
    <!-- Company Information -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
        <div class="text-center py-6 px-4">
            <h2 class="text-2xl font-bold text-blue-600 mb-2">COMPANY</h2>
            <h3 class="text-xl font-light text-blue-400 mb-4">INFORMATION</h3>
            <div class="w-full h-1 bg-gray-300 mb-6"></div>
        </div>
        <nav class="pb-4">
            @foreach($companyCategories as $category)
                <a href="{{ route($category['route']) }}" class="flex items-center px-6 py-3 {{ $category['key'] === $activePage ? 'text-blue-600 font-medium border-l-4 border-blue-600 bg-blue-50' : 'text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition-colors' }}">
                    <span class="w-2 h-2 {{ $category['key'] === $activePage ? 'bg-blue-600' : 'bg-gray-400' }} rounded-full mr-3"></span>
                    <span data-ko="{{ $category['ko'] }}" data-en="{{ $category['en'] }}" data-vi="{{ $category['vi'] }}">{{ $category['ko'] }}</span>
                </a>
            @endforeach
        </nav>
    </div>

    @include('Frontend.components.customer-support')
</div>
