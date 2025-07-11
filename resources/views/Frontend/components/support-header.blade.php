<div class="mb-0">
    <!-- Mobile Header -->
    <div class="block lg:hidden">
        <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
            <div class="flex items-center justify-center mb-2">
                <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                <h1 class="text-lg font-bold text-blue-600 text-center" data-ko="고객 상담" data-en="Customer Consultation" data-vi="Tư vấn khách hàng">고객 상담</h1>
            </div>
            <p class="text-center text-xs text-gray-500">Technical Granite Stage Technology</p>
        </div>
    </div>

    <!-- Desktop Header -->
    <div class="hidden lg:block">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between pb-4 border-b-2 border-gray-200">
            <div class="flex flex-col lg:flex-row lg:items-center mb-4 lg:mb-0">
                <div class="flex items-center mb-2 lg:mb-0">
                    <span class="w-3 h-3 bg-blue-600 rounded-full mr-3"></span>
                    <h1 class="text-2xl lg:text-3xl font-bold text-blue-600 mr-0 lg:mr-4" data-ko="고객 상담" data-en="Customer Consultation" data-vi="Tư vấn khách hàng">견적의뢰</h1>
                </div>
                <span class="text-gray-400 text-sm lg:text-lg">Technical Granite Stage Technology</span>
            </div>
            <div class="flex items-center text-sm text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-blue-600" data-ko="HOME" data-en="HOME" data-vi="TRANG CHỦ">HOME</a>
                <span class="mx-2">></span>
                <a href="{{ route('support') }}" class="hover:text-blue-600" data-ko="고객지원" data-en="Customer Support" data-vi="Hỗ trợ khách hàng">고객지원</a>
                <span class="mx-2">></span>
                <span class="text-blue-600" data-ko="고객상담" data-en="Customer Consultation" data-vi="Tư vấn khách hàng">고객상담</span>
            </div>
        </div>
    </div>
</div>