<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configs = [
            ['key' => 'banners', 'value' => null],
            ['key' => 'logo', 'value' => null],
            ['key' => 'icon', 'value' => null],
            ['key' => 'zalo', 'value' => null],
        ];

        foreach ($configs as $config) {
            DB::table('config')->insertOrIgnore([
                'key' => $config['key'],
                'value' => $config['value'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
