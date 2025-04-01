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
            'salary' => '5000 USD',
            'location' => 'Hanoi, Vietnam',
            'category_id' => 1,
            'employer_id' => 1,
            'posted_date' => now(),
            'expiry_date' => now()->addDays(30),
            'required_education' => 'Bachelor',
            'required_exp' => '5 years',
            'job_type' => 'fulltime',
            'approval_status' => 'pending',
        ]);

        Job::create([
            'job_title' => 'Backend Developer',
            'slug' => 'backend-developer',
            'job_description' => 'Responsible for coding and software development.',
            'requirements' => 'Experience with Laravel.',
            'salary' => '10000000',
            'location' => 'Hanoi, Vietnam',
            'category_id' => 1,
            'employer_id' => 2,
            'posted_date' => now(),
            'expiry_date' => now()->addDays(30),
            'required_education' => 'Đại học',
            'required_exp' => '2 years',
            'job_type' => 'fulltime',
            'approval_status' => 'pending',
        ]);
    }
}
