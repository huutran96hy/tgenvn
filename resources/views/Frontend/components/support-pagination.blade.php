<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-8 p-4 bg-white rounded-lg shadow-sm border border-gray-200">
    <!-- Left Section - List View Toggle -->
    <div class="flex items-center space-x-2 order-2 sm:order-1">
        
    </div>

    <!-- Center Section - Pagination Controls -->
    <div class="flex items-center space-x-1 sm:space-x-2 order-1 sm:order-2">
        <!-- Previous Button -->
        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1" 
                disabled>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="sr-only" data-ko="이전 페이지" data-en="Previous page" data-vi="Trang trước">이전 페이지</span>
        </button>

        <!-- Previous Text (Hidden on mobile) -->
        <span class="hidden md:inline text-sm text-gray-500 px-2" data-ko="이전" data-en="Previous" data-vi="Trước">이전</span>

        <!-- Page Numbers -->
        <div class="flex items-center space-x-1">
            <!-- Current Page -->
            <span class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium min-w-[40px] text-center">1</span>
            
            <!-- Other Pages (Hidden on mobile) -->
            <button class="hidden sm:inline-flex px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm font-medium min-w-[40px] justify-center transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">2</button>
            <button class="hidden sm:inline-flex px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm font-medium min-w-[40px] justify-center transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">3</button>
            
            <!-- Dots (Hidden on mobile) -->
            <span class="hidden lg:inline px-2 text-gray-400">...</span>
            <button class="hidden lg:inline-flex px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm font-medium min-w-[40px] justify-center transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">10</button>
        </div>

        <!-- Next Text (Hidden on mobile) -->
        <span class="hidden md:inline text-sm text-gray-500 px-2" data-ko="다음" data-en="Next" data-vi="Sau">다음</span>

        <!-- Next Button -->
        <button class="p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="sr-only" data-ko="다음 페이지" data-en="Next page" data-vi="Trang sau">다음 페이지</span>
        </button>
    </div>

    <!-- Right Section - New Post Button -->
    <div class="flex items-center space-x-2 order-3">
       
    </div>

    <!-- Mobile Page Info -->
    <div class="sm:hidden w-full text-center text-sm text-gray-500 order-4">
        <span data-ko="1 / 10 페이지" data-en="Page 1 of 10" data-vi="Trang 1 / 10">1 / 10 페이지</span>
    </div>
</div>
