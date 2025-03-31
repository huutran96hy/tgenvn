<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;
class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Candidate::create([
            'full_name' => 'Nguyen Van A',
            'phone' => '0123456789',
            'address' => 'Hanoi, Vietnam',
            'resume' => 'resume.pdf',
            'education' => 'Bachelor of Engineering',
        ]);

        Candidate::create([
            'full_name' => 'Le Thi B',
            'phone' => '0987654321',
            'address' => 'Ho Chi Minh City, Vietnam',
            'resume' => 'resume2.pdf',
            'education' => 'Master of Computer Science',
        ]);
    }
}
