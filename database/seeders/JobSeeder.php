<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    public function run()
    {
        Job::create([
            'job_title' => 'Senior Developer',
            'slug' => 'senior-developer',
            'job_description' => 'Responsible for coding and software development.',
            'requirements' => 'Experience with Laravel and Vue.js.',
            'salary' => '5000000',
            'location' => 'Hanoi, Vietnam',
            'province_id' => 1,
            'category_id' => 1,
            'employer_id' => 1,
            'posted_date' => now(),
            'expiry_date' => now()->addDays(30),
            'required_education' => 'Cử nhân',
            'required_exp' => '5 years',
            'job_type' => 'Remote',
            'approval_status' => 'approved',
        ]);

        Job::create([
            'job_title' => 'Backend Developer',
            'slug' => 'backend-developer',
            'job_description' => 'Responsible for coding and software development.',
            'requirements' => 'Experience with Laravel.',
            'salary' => '10000000',
            'location' => 'Hanoi, Vietnam',
            'province_id' => 10,
            'category_id' => 1,
            'employer_id' => 2,
            'posted_date' => now(),
            'expiry_date' => now()->addDays(50),
            'required_education' => 'Đại học',
            'required_exp' => '2 years',
            'job_type' => 'Fulltime',
            'approval_status' => 'approved',
            'created_at' => now()->subDays(10),
            'updated_at' => now()->subDays(10),
        ]);
    }
}
