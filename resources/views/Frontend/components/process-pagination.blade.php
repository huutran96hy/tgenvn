@php
    $paginator = $processes; // hoặc $paginator = $yourPaginationVariable;
@endphp

<div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-8 p-4 bg-white rounded-lg shadow-sm border border-gray-200">
    <!-- Left Section (tuỳ bạn dùng) -->
    <div class="flex items-center space-x-2 order-2 sm:order-1"></div>

    <!-- Center Section - Pagination Controls -->
    <div class="flex items-center space-x-1 sm:space-x-2 order-1 sm:order-2">
        <!-- Previous Button -->
        <a href="{{ $paginator->previousPageUrl() }}"
           class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 {{ $paginator->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}"
           @if($paginator->onFirstPage()) aria-disabled="true" tabindex="-1" @endif>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="sr-only" data-ko="이전 페이지" data-en="Previous page" data-vi="Trang trước">이전 페이지</span>
        </a>
        <!-- Previous Text -->
        <span class="hidden md:inline text-sm text-gray-500 px-2" data-ko="이전" data-en="Previous" data-vi="Trước">이전</span>

        <!-- Page Numbers -->
        <div class="flex items-center space-x-1">
            @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                @if ($page == $paginator->currentPage())
                    <span class="px-3 py-2 bg-blue-600 text-white rounded-lg text-sm font-medium min-w-[40px] text-center">{{ $page }}</span>
                @elseif (
                    $page == 1 ||
                    $page == $paginator->lastPage() ||
                    ($page >= $paginator->currentPage() - 1 && $page <= $paginator->currentPage() + 1)
                )
                    <a href="{{ $paginator->url($page) }}"
                        class="hidden sm:inline-flex px-3 py-2 text-gray-600 hover:bg-gray-100 rounded-lg text-sm font-medium min-w-[40px] justify-center transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1">
                        {{ $page }}
                    </a>
                @elseif (
                    $page == $paginator->currentPage() - 2 ||
                    $page == $paginator->currentPage() + 2
                )
                    <span class="hidden lg:inline px-2 text-gray-400">...</span>
                @endif
            @endfor
        </div>

        <!-- Next Text -->
        <span class="hidden md:inline text-sm text-gray-500 px-2" data-ko="다음" data-en="Next" data-vi="Sau">다음</span>
        <!-- Next Button -->
        <a href="{{ $paginator->nextPageUrl() }}"
           class="p-2 {{ $paginator->hasMorePages() ? 'text-gray-600 hover:text-gray-800 hover:bg-gray-100' : 'pointer-events-none opacity-50 text-gray-400' }} rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1"
           @if(!$paginator->hasMorePages()) aria-disabled="true" tabindex="-1" @endif>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="sr-only" data-ko="다음 페이지" data-en="Next page" data-vi="Trang sau">다음 페이지</span>
        </a>
    </div>

    <!-- Right Section (tuỳ bạn dùng) -->
    <div class="flex items-center space-x-2 order-3"></div>

    <!-- Mobile Page Info -->
    <div class="sm:hidden w-full text-center text-sm text-gray-500 order-4">
        <span data-ko="{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }} 페이지"
              data-en="Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}"
              data-vi="Trang {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}">
            {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }} 페이지
        </span>
    </div>
</div>
