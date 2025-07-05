<div class="relative">
    <button id="languageBtn" class="flex items-center space-x-2 px-3 py-2 text-sm text-gray-700 hover:text-blue-600 transition-colors">
        <span class="flag-icon flag-kr"></span>
        <span id="currentLang">한국어</span>
        <svg class="w-4 h-4 transition-transform" id="langArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    
    <div id="languageDropdown" class="language-dropdown absolute right-0 mt-2 w-44 bg-white rounded-lg shadow-lg border border-gray-200 py-2">
        <button class="lang-option w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 flex items-center" data-lang="ko">
            <span class="flag-icon flag-kr"></span>
            한국어
        </button>
        <button class="lang-option w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 flex items-center" data-lang="en">
            <span class="flag-icon flag-us"></span>
            English
        </button>
        <button class="lang-option w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 flex items-center" data-lang="vi">
            <span class="flag-icon flag-vn"></span>
            Tiếng Việt
        </button>
    </div>
</div>
