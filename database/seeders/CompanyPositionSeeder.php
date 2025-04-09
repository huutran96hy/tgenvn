<?php

namespace Database\Seeders;

use App\Models\CompanyPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyPosition::create([
            'name' => 'Nhân Viên',
        ]);

        CompanyPosition::create([
            'name' => 'Trưởng phòng',
        ]);
    }
}
