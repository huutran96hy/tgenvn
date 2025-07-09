<div class="bg-white rounded-lg shadow-sm p-8">
    <!-- Title Section -->
    <div class="flex items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">
            <span data-ko="HISTORY of" data-en="HISTORY of" data-vi="LỊCH SỬ">HISTORY of</span>
            <span class="text-blue-600 italic ml-2">TG ENC</span>
        </h2>
    </div>

    <!-- History Table -->
    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-50">
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700" data-ko="제작년도" data-en="Year" data-vi="Năm">제작년도</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700" data-ko="제작업체" data-en="Company" data-vi="Công ty">제작업체</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700" data-ko="장 비 명" data-en="Equipment" data-vi="Thiết bị">장 비 명</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700">STAGE<br>SIZE</th>
                    <th class="border border-gray-300 px-4 py-3 text-center font-semibold text-gray-700" data-ko="비 고" data-en="Note" data-vi="Ghi chú">비 고</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $historyData = [
                        ['year' => '2017~2019', 'company' => 'TAZMO', 'equipment' => '10.5G SLIDE RAIL', 'size' => '7300X3000X300', 'note' => 'OLED'],
                        ['year' => '', 'company' => '', 'equipment' => '8.5G SLIDE RAIL', 'size' => '6000X1800X180', 'note' => 'OLED'],
                        ['year' => '', 'company' => '', 'equipment' => '8.5G SLIDE RAIL', 'size' => '6000X1800X180', 'note' => 'LCD'],
                        ['year' => '2016~2017', 'company' => 'SAMSUNG', 'equipment' => '2nd Scriber Build', 'size' => '', 'note' => 'LCD'],
                        ['year' => '2014~2016', 'company' => 'GD TECH', 'equipment' => 'SPIRIT STAGE', 'size' => '', 'note' => '반도체'],
                        ['year' => '2013~2014', 'company' => 'POSCO', 'equipment' => 'COLOR COATER', 'size' => '4200X2800X1600', 'note' => 'COATING M/C'],
                        ['year' => '', 'company' => 'AP SYSTEM', 'equipment' => 'Gantry Stage', 'size' => '2800 X 2200', 'note' => ''],
                        ['year' => '2009~2011', 'company' => '', 'equipment' => 'Sprit Type/Air Bearing Stage', 'size' => '3600 X 3200', 'note' => 'OLED Stage'],
                        ['year' => '', 'company' => '', 'equipment' => 'Air Bearing Stage', 'size' => '4350 X 3500', 'note' => ''],
                        ['year' => '', 'company' => '', 'equipment' => 'Gantry / Air Bearing Stage', 'size' => '7300 X 4350', 'note' => ''],
                        ['year' => '', 'company' => 'CORE-SYSTEMS', 'equipment' => 'Gantry Stage', 'size' => '3650 X 3200', 'note' => 'LCD 8G 검사장비'],
                        ['year' => '2010~2011', 'company' => '', 'equipment' => 'Gantry Stage', 'size' => '3850 X 3200', 'note' => 'CVD 8G'],
                        ['year' => '', 'company' => '', 'equipment' => 'Gantry Stage', 'size' => '3850 X 3200', 'note' => 'Prism Stage 8G'],
                        ['year' => '2009~2011', 'company' => 'ORBOTECH', 'equipment' => 'Gantry Stage', 'size' => '3650 X 3200', 'note' => 'AOI 8G'],
                        ['year' => '2003~2011', 'company' => '가네스', 'equipment' => 'Sprit Type Stage', 'size' => '1600 X 1040', 'note' => '반도체장비'],
                        ['year' => '2009~2011', 'company' => 'NCB', 'equipment' => 'Gantry / Air Bearing Stage', 'size' => '4200 X 3300', 'note' => 'AOI Gantry'],
                        ['year' => '2004~2005', 'company' => 'KC-TECH', 'equipment' => 'Groove Chuck Stage', 'size' => '3800 X 3200', 'note' => 'Spin-Less Coater'],
                        ['year' => '2004~2005', 'company' => 'CMO', 'equipment' => 'Air Bearing Stage', 'size' => '3250 X 2800', 'note' => 'LCD 5.5G 검사장비'],
                        ['year' => '2004~2010', 'company' => '한국', 'equipment' => 'Gantry Stage', 'size' => '3650 X 3200', 'note' => 'LCD 8G 검사장비'],
                        ['year' => '2004~2009', 'company' => 'K-MAC', 'equipment' => 'Gantry Stage', 'size' => '3650 X 3200', 'note' => 'LCD 8G 검사장비']
                    ];
                @endphp

                @foreach($historyData as $index => $data)
                    <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-blue-50 transition-colors">
                        <td class="border border-gray-300 px-4 py-3 text-center {{ $data['year'] ? 'font-medium text-green-600' : '' }}">
                            {{ $data['year'] }}
                        </td>
                        <td class="border border-gray-300 px-4 py-3 text-center {{ $data['company'] ? 'font-medium' : '' }}">
                            {{ $data['company'] }}
                        </td>
                        <td class="border border-gray-300 px-4 py-3 text-center">
                            {{ $data['equipment'] }}
                        </td>
                        <td class="border border-gray-300 px-4 py-3 text-center text-sm">
                            {{ $data['size'] }}
                        </td>
                        <td class="border border-gray-300 px-4 py-3 text-center {{ $data['note'] ? 'text-blue-600 font-medium' : '' }}">
                            {{ $data['note'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
