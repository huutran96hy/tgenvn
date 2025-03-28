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
        DB::table('config')->insert([
            'config_key' => 'theme',
            'config_value' => 'light',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
