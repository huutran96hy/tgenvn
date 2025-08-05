<div class="bg-white rounded-lg shadow-sm">
    <div class="mb-6 lg:mb-8">
        <!-- Mobile Header -->
        <div class="block lg:hidden">
            <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
                <div class="flex items-center justify-center mb-2">
                    <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                    <h1 class="text-lg font-bold text-blue-600 text-center" data-ko="공지 사항" data-en="Notices" data-vi="Thông báo">공지 사항</h1>
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
                        <h1 class="text-2xl lg:text-3xl font-bold text-blue-600 mr-0 lg:mr-4" data-ko="공지 사항" data-en="Notices" data-vi="Thông báo">공지 사항</h1>
                    </div>
                    <span class="text-gray-400 text-sm lg:text-lg">Technical Granite Stage Technology</span>
                </div>
                <div class="flex items-center text-sm text-gray-500">
                    <a href="{{ route('home') }}" class="hover:text-blue-600" data-ko="HOME" data-en="HOME" data-vi="TRANG CHỦ">HOME</a>
                    <span class="mx-2">></span>
                    <a href="{{ route('support') }}" class="hover:text-blue-600" data-ko="고객지원" data-en="Customer Support" data-vi="Hỗ trợ khách hàng">고객지원</a>
                    <span class="mx-2">></span>
                    <span class="text-blue-600" data-ko="공지 사항" data-en="Notices" data-vi="Thông báo">공지 사항</span>
                </div>
            </div>
        </div>
    </div>


    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">STT</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" data-ko="제목" data-en="Title" data-vi="Tiêu đề">제목</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32" data-ko="작성자" data-en="Author" data-vi="Người gửi">작성자</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-32" data-ko="작성일" data-en="Date" data-vi="Ngày gửi">작성일</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-20" data-ko="조회" data-en="Views" data-vi="Đã xem">조회</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php
                $supportItems = [];
                $supportItem = [
                ['id' => 1, 'title' => '사업인 견적 요청드립니다. 🔒', 'author' => '정동수', 'date' => '08-12-2023', 'views' => 3],
                ];
                @endphp

                @foreach($supportItems as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">{{ $item['id'] }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">
                        <a href="#" class="hover:text-blue-600 transition-colors">
                            {{ $item['title'] }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item['author'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item['date'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $item['views'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>