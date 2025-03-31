<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    public function run()
    {
        NewsCategory::create([
            'category_name' => 'Tech News',
            'description' => 'Latest news in the technology industry.',
        ]);

        NewsCategory::create([
            'category_name' => 'Business News',
            'description' => 'Latest updates in business and finance.',
        ]);
    }
}