@php
    $activePage = $activePage ?? '';
    $supportCategories = [
        ['route' => 'support.notices', 'key' => 'notices', 'ko' => '공지 사항', 'en' => 'Notices', 'vi' => 'Thông báo']
        
    ];
@endphp

<div class="w-full lg:col-span-1">
    <!-- Mobile Navigation -->
    <div class="block lg:hidden mb-6">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Mobile Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-3">
                <h3 class="text-white font-bold text-center text-sm">
                    <span data-ko="생산공정" data-en="CUSTOMER CENTER" data-vi="CUSTOMER CENTER">생산공정</span>
                </h3>
            </div>
            
            <!-- Mobile Navigation Tabs -->
            <div class="p-3">
                <div class="grid grid-cols-2 gap-2">
                    @foreach($supportCategories as $category)
                        <a href="{{ route($category['route']) }}" 
                           class="px-4 py-3 rounded-lg text-sm font-medium text-center transition-all duration-200 {{ $category['key'] === $activePage ? 'bg-blue-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-blue-50 hover:text-blue-600' }}">
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
        <!-- Process Information -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-1 py-1 text-center">
                <h2 class="text-2xl font-bold text-white mb-0">CUSTOMER</h2>
                <h3 class="text-xl font-light text-white mb-1">CENTER</h3>
                <div class="w-full h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
            </div>
            
            <nav class="pb-4">
                @foreach($supportCategories as $category)
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

