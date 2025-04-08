<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name' => 'Hà Nội', 'type' => 'Thành phố trực thuộc TW', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Vĩnh Phúc', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Bắc Ninh', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Quảng Ninh', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Hải Dương', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Hải Phòng', 'type' => 'Thành phố trực thuộc TW', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Hưng Yên', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Thái Bình', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Hà Nam', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Nam Định', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],
            ['name' => 'Ninh Bình', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Hồng'],

            ['name' => 'Hà Giang', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Cao Bằng', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Bắc Kạn', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Tuyên Quang', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Lào Cai', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Yên Bái', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Thái Nguyên', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Lạng Sơn', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Bắc Giang', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Phú Thọ', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Điện Biên', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Lai Châu', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Sơn La', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],
            ['name' => 'Hoà Bình', 'type' => 'Tỉnh', 'region' => 'Trung du và miền núi phía Bắc'],

            ['name' => 'Thanh Hoá', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Nghệ An', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Hà Tĩnh', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Quảng Bình', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Quảng Trị', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Thừa Thiên Huế', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Đà Nẵng', 'type' => 'Thành phố trực thuộc TW', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Quảng Nam', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Quảng Ngãi', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Bình Định', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Phú Yên', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Khánh Hoà', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Ninh Thuận', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],
            ['name' => 'Bình Thuận', 'type' => 'Tỉnh', 'region' => 'Bắc Trung Bộ và Duyên hải miền Trung'],

            ['name' => 'Kon Tum', 'type' => 'Tỉnh', 'region' => 'Tây Nguyên'],
            ['name' => 'Gia Lai', 'type' => 'Tỉnh', 'region' => 'Tây Nguyên'],
            ['name' => 'Đắk Lắk', 'type' => 'Tỉnh', 'region' => 'Tây Nguyên'],
            ['name' => 'Đắk Nông', 'type' => 'Tỉnh', 'region' => 'Tây Nguyên'],
            ['name' => 'Lâm Đồng', 'type' => 'Tỉnh', 'region' => 'Tây Nguyên'],

            ['name' => 'Bình Phước', 'type' => 'Tỉnh', 'region' => 'Đông Nam Bộ'],
            ['name' => 'Tây Ninh', 'type' => 'Tỉnh', 'region' => 'Đông Nam Bộ'],
            ['name' => 'Bình Dương', 'type' => 'Tỉnh', 'region' => 'Đông Nam Bộ'],
            ['name' => 'Đồng Nai', 'type' => 'Tỉnh', 'region' => 'Đông Nam Bộ'],
            ['name' => 'Bà Rịa - Vũng Tàu', 'type' => 'Tỉnh', 'region' => 'Đông Nam Bộ'],
            ['name' => 'TP.Hồ Chí Minh', 'type' => 'Thành phố trực thuộc TW', 'region' => 'Đông Nam Bộ'],

            ['name' => 'Long An', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Tiền Giang', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Bến Tre', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Trà Vinh', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Vĩnh Long', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Đồng Tháp', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'An Giang', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Kiên Giang', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Cần Thơ', 'type' => 'Thành phố trực thuộc TW', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Hậu Giang', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Sóc Trăng', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Bạc Liêu', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
            ['name' => 'Cà Mau', 'type' => 'Tỉnh', 'region' => 'Đồng bằng sông Cửu Long'],
        ];

        DB::table('provinces')->insert($provinces);
    }
}
