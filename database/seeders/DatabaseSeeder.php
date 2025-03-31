<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => User::ADMIN_ROLE,
        ]);

        $this->call(ConfigSeeder::class);
        // $this->call(CandidateSeeder::class);
        $this->call(EmployerSeeder::class);
        $this->call(JobCategorySeeder::class);
        $this->call(JobSeeder::class);
        $this->call(NewsCategorySeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(SkillSeeder::class);
    }
}
