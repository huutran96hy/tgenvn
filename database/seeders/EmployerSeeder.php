<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use Faker\Factory as Faker;

class EmployerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Tạo 40 bản ghi ngẫu nhiên
        foreach (range(1, 50) as $index) {
            Employer::create([
                'company_name' => $faker->company,
                'slug' => $faker->slug,
                'logo' => 'logo.png',
                'background_img' => 'background.png',
                'company_description' => $faker->paragraph,
                'website' => $faker->url,
                'contact_phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'email' => $faker->companyEmail,
                'is_hot' => $faker->boolean(50) ? 'yes' : 'no',
                'founded_at' => $faker->date(),
                'about' => $faker->paragraph,
                'company_type' => $faker->word,
            ]);
        }
    }
}
