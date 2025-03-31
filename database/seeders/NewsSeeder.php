<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run()
    {
        News::create([
            'title' => 'New Tech Innovations',
            'images' => 'tech_innovations.png',
            'content' => 'This is a detailed article about new tech innovations.',
            'published_date' => now(),
            'author_id' => 1,
            'news_category_id' => 1,
            'status' => 'published',
        ]);
    }
}
