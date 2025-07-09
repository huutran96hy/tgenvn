<div class="bg-white rounded-lg shadow-sm p-8">
    <!-- Product Title and Description -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-blue-600 mb-4" data-ko="일반 검사용 규격 제품 Granite Inspection Surface Plate" data-en="General Inspection Standard Product Granite Inspection Surface Plate" data-vi="Sản phẩm tiêu chuẩn kiểm tra chung Granite Inspection Surface Plate">
            일반 검사용 규격 제품 Granite Inspection Surface Plate
        </h2>
        <p class="text-gray-700 leading-relaxed" data-ko="화강석 재질로 제작된 석정반은 제품이 가진 고유도, 고정도, 고품질, 저팽창의 특성으로 고정밀도를 구현할 수 있는 최고의 측정용 제품입니다." data-en="Granite surface plates made of granite material are the best measuring products that can achieve high precision with the inherent characteristics of high rigidity, high precision, high quality, and low expansion." data-vi="Bàn đá granite được làm từ vật liệu granite là sản phẩm đo lường tốt nhất có thể đạt được độ chính xác cao với các đặc tính vốn có của độ cứng cao, độ chính xác cao, chất lượng cao và độ giãn nở thấp.">
            화강석 재질로 제작된 석정반은 제품이 가진 고유도, 고정도, 고품질, 저팽창의 특성으로<br>
            고정밀도를 구현할 수 있는 최고의 측정용 제품입니다.
        </p>
    </div>

    <!-- Product Images -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-gray-100 rounded-lg p-6 flex items-center justify-center h-48">
            <div class="text-center">
                <div class="w-32 h-20 bg-gray-800 rounded-lg mx-auto mb-4"></div>
                <p class="text-sm text-gray-600" data-ko="일반 석정반" data-en="General Surface Plate" data-vi="Bàn đá chung">일반 석정반</p>
            </div>
        </div>
        <div class="bg-gray-100 rounded-lg p-6 flex items-center justify-center h-48">
            <div class="text-center">
                <div class="relative">
                    <div class="w-32 h-20 bg-gray-800 rounded-lg mx-auto mb-4"></div>
                    <div class="absolute -top-2 -right-2 w-8 h-16 bg-gray-600 rounded"></div>
                    <div class="absolute -top-2 -left-2 w-8 h-16 bg-gray-600 rounded"></div>
                </div>
                <p class="text-sm text-gray-600" data-ko="스탠드형 석정반" data-en="Stand Type Surface Plate" data-vi="Bàn đá có chân đế">스탠드형 석정반</p>
            </div>
        </div>
    </div>

    <!-- Specifications Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-blue-50">
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700" data-ko="규격" data-en="Size" data-vi="Kích thước">규격</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700" colspan="2" data-ko="평탄도" data-en="Flatness" data-vi="Độ phẳng">평탄도</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700" data-ko="중량" data-en="Weight" data-vi="Trọng lượng">중량</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700" data-ko="대략단가" data-en="Price" data-vi="Giá">대략단가</th>
                </tr>
                <tr class="bg-gray-50">
                    <th class="border border-gray-300 px-4 py-2 text-center text-sm text-gray-600">가로 × 세로 × 높이</th>
                    <th class="border border-gray-300 px-4 py-2 text-center text-sm text-gray-600">0.01mm</th>
                    <th class="border border-gray-300 px-4 py-2 text-center text-sm text-gray-600">0.001inch</th>
                    <th class="border border-gray-300 px-4 py-2 text-center text-sm text-gray-600">Kg</th>
                    <th class="border border-gray-300 px-4 py-2 text-center text-sm text-gray-600">만원</th>
                </tr>
            </thead>
            <tbody>
                @php
                $specifications = [
                ['size' => '300', 'width' => '300', 'height' => '80', 'flatness_mm' => '2', 'flatness_inch' => '4', 'weight' => '22', 'price' => '424'],
                ['size' => '450', 'width' => '300', 'height' => '80', 'flatness_mm' => '2', 'flatness_inch' => '4', 'weight' => '32', 'price' => '540'],
                ['size' => '500', 'width' => '500', 'height' => '100', 'flatness_mm' => '2', 'flatness_inch' => '4', 'weight' => '75', 'price' => '707'],
                ['size' => '600', 'width' => '450', 'height' => '100', 'flatness_mm' => '2.5', 'flatness_inch' => '5', 'weight' => '81', 'price' => '750'],
                ['size' => '600', 'width' => '600', 'height' => '120', 'flatness_mm' => '2.5', 'flatness_inch' => '5', 'weight' => '130', 'price' => '840'],
                ['size' => '750', 'width' => '500', 'height' => '130', 'flatness_mm' => '2.5', 'flatness_inch' => '5', 'weight' => '146', 'price' => '901'],
                ['size' => '900', 'width' => '600', 'height' => '130', 'flatness_mm' => '3', 'flatness_inch' => '6', 'weight' => '211', 'price' => '1082'],
                ['size' => '1000', 'width' => '750', 'height' => '150', 'flatness_mm' => '3', 'flatness_inch' => '6', 'weight' => '338', 'price' => '1250'],
                ['size' => '1000', 'width' => '1000', 'height' => '150', 'flatness_mm' => '3.5', 'flatness_inch' => '7', 'weight' => '450', 'price' => '1414'],
                ['size' => '1200', 'width' => '900', 'height' => '180', 'flatness_mm' => '3.5', 'flatness_inch' => '7', 'weight' => '486', 'price' => '1500'],
                ['size' => '1500', 'width' => '1000', 'height' => '200', 'flatness_mm' => '4', 'flatness_inch' => '8', 'weight' => '900', 'price' => '1803'],
                ['size' => '2000', 'width' => '1000', 'height' => '200', 'flatness_mm' => '4.5', 'flatness_inch' => '9', 'weight' => '1200', 'price' => '2236'],
                ['size' => '2000', 'width' => '1500', 'height' => '250', 'flatness_mm' => '5', 'flatness_inch' => '10', 'weight' => '2250', 'price' => '2500'],
                ['size' => '3000', 'width' => '1500', 'height' => '300', 'flatness_mm' => '6', 'flatness_inch' => '12', 'weight' => '4050', 'price' => '3354'],
                ['size' => '3000', 'width' => '2000', 'height' => '300', 'flatness_mm' => '7.5', 'flatness_inch' => '15', 'weight' => '5400', 'price' => '3605']
                ];
                @endphp

                @foreach($specifications as $index => $spec)
                <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50 transition-colors">
                    <td class="border border-gray-300 px-4 py-3 text-center font-medium">
                        {{ $spec['size'] }} × {{ $spec['width'] }} × {{ $spec['height'] }}
                    </td>
                    <td class="border border-gray-300 px-4 py-3 text-center">{{ $spec['flatness_mm'] }}</td>
                    <td class="border border-gray-300 px-4 py-3 text-center">{{ $spec['flatness_inch'] }}</td>
                    <td class="border border-gray-300 px-4 py-3 text-center">{{ $spec['weight'] }}</td>
                    <td class="border border-gray-300 px-4 py-3 text-center text-blue-600 font-medium">{{ $spec['price'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>