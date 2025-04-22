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
            DB::table('config')->updateOrInsert(
                ['key' => $config['key']],
                ['value' => $config['value'], 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }
}
