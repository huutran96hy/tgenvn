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
                $supportItems = [
                    ['id' => 23, 'title' => '사업인 견적 요청드립니다. 🔒', 'author' => '정동수', 'date' => '08-12-2023', 'views' => 3],
                    ['id' => 22, 'title' => '에어시스템 정밀 공구인 시고', 'author' => '채동준', 'date' => '06-12-2023', 'views' => 5],
                    ['id' => 21, 'title' => '사업인 견적의뢰 🔒', 'author' => '전미근', 'date' => '22-03-2021', 'views' => 7],
                    ['id' => 20, 'title' => '사업인 견적 문의 🔒', 'author' => '김태영', 'date' => '12-03-2020', 'views' => 9],
                    ['id' => 19, 'title' => '사업인 견적 문의 견적 🔒', 'author' => '송우범', 'date' => '27-02-2020', 'views' => 11],
                    ['id' => 18, 'title' => '사업인 견적 의뢰', 'author' => '김기준', 'date' => '28-10-2019', 'views' => 13],
                    ['id' => 17, 'title' => '견적 문의', 'author' => 'KTM', 'date' => '31-08-2019', 'views' => 15],
                    ['id' => 16, 'title' => '시간 적인 정밀 견적의뢰 입니다.', 'author' => '곽노신', 'date' => '16-06-2019', 'views' => 17],
                    ['id' => 15, 'title' => '사업인 견적 문의', 'author' => 'YCC', 'date' => '30-05-2019', 'views' => 19],
                    ['id' => 14, 'title' => '사업인 견적 문의 드립니다. 🔒 📎', 'author' => '유니케미칼', 'date' => '30-01-2019', 'views' => 21],
                    ['id' => 13, 'title' => '사업인 견적 의뢰 #', 'author' => '이종선', 'date' => '15-03-2019', 'views' => 23],
                    ['id' => 12, 'title' => '사업인 견적의뢰 # 📎', 'author' => '김종민', 'date' => '14-03-2019', 'views' => 25],
                    ['id' => 11, 'title' => '사업인 견적 의뢰 요청 #', 'author' => '(주)삼성', 'date' => '24-02-2018', 'views' => 27],
                    ['id' => 10, 'title' => '사업인 견적 의뢰 요청 #', 'author' => '김기영', 'date' => '23-12-2017', 'views' => 29]
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
