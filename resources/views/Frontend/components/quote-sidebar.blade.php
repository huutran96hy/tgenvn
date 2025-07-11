<div class="w-full lg:col-span-1">
    <!-- Mobile Navigation -->
    <div class="block lg:hidden mb-6">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Mobile Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-3">
                <h3 class="text-white font-bold text-center text-sm">
                    <span data-ko="고객센터" data-en="CUSTOMER CENTER" data-vi="TRUNG TÂM KHÁCH HÀNG">고객센터</span>
                </h3>
            </div>
            <!-- Mobile Quick Actions -->
            <div class="p-3">
                <div class="grid grid-cols-2 gap-2 mb-4">
                    <button class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-3 rounded-lg text-sm font-medium transition-colors duration-200">
                        <div class="text-center">
                            <div class="text-lg mb-1">📝</div>
                            <span data-ko="견적 신청" data-en="Quote Request" data-vi="Yêu cầu báo giá">견적 신청</span>
                        </div>
                    </button>
                    <button class="bg-gray-100 hover:bg-blue-50 text-gray-700 hover:text-blue-600 px-3 py-3 rounded-lg text-sm font-medium transition-colors duration-200">
                        <div class="text-center">
                            <div class="text-lg mb-1">💬</div>
                            <span data-ko="견적 상담" data-en="Quote Consultation" data-vi="Tư vấn báo giá">견적 상담</span>
                        </div>
                    </button>
                </div>
                
                <!-- Mobile Contact Info -->
                <div class="bg-gray-50 rounded-lg p-3">
                    <div class="grid grid-cols-2 gap-3 text-sm">
                        <a href="tel:031-431-4418" class="flex items-center justify-center bg-green-100 text-green-700 py-2 rounded font-medium hover:bg-green-200 transition-colors">
                            <span class="mr-1">📞</span>
                            <span class="text-xs">031-431-4418</span>
                        </a>
                        <a href="mailto:tgenc@tg-enc.co.kr" class="flex items-center justify-center bg-blue-100 text-blue-700 py-2 rounded font-medium hover:bg-blue-200 transition-colors">
                            <span class="mr-1">✉️</span>
                            <span class="text-xs">Email</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Mobile Customer Support -->
        @include('Frontend.components.customer-support-mobile')
    </div>

    <!-- Desktop Sidebar -->
    <div class="hidden lg:block space-y-6">
        <!-- Customer's Center -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-1 py-1 text-center">
                <h2 class="text-2xl font-bold text-white mb-0">CUSTOMER'S</h2>
                <h3 class="text-xl font-light text-white mb-1">CENTER</h3>
                <div class="w-full h-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
            </div>
            <div class="p-6">
                <!-- Navigation Links -->
                <nav class="mb-6">
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center text-blue-600 hover:text-blue-800 transition-colors py-2 group">
                                <span class="w-2 h-2 bg-blue-600 rounded-full mr-3 flex-shrink-0 group-hover:bg-blue-800 transition-colors"></span>
                                <span data-ko="견적 신청" data-en="Quote Request" data-vi="Yêu cầu báo giá">견적 신청</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 transition-colors py-2 group">
                                <span class="w-2 h-2 bg-gray-400 rounded-full mr-3 flex-shrink-0 group-hover:bg-blue-500 transition-colors"></span>
                                <span data-ko="견적 상담" data-en="Quote Consultation" data-vi="Tư vấn báo giá">견적 상담</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Contact Information -->
                 @include('Frontend.components.customer-support')
            </div>
        </div>
    </div>
</div>
