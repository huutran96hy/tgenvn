<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    public function run()
    {
        JobCategory::create([
            'category_name' => 'Software Development',
            'description' => 'Jobs related to software development.',
        ]);

        JobCategory::create([
            'category_name' => 'Marketing',
            'description' => 'Jobs related to marketing and sales.',
        ]);
    }
}
