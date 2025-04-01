<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;

class EmployerSeeder extends Seeder
{
    public function run()
    {
        Employer::create([
            'company_name' => 'Tech Solutions',
            'slug' => 'tech-solutions',
            'logo' => 'logo.png',
            'background_img' => 'background.png',
            'company_description' => 'A leading tech company.',
            'website' => 'http://techsolutions.com',
            'contact_phone' => '0241234567',
            'address' => 'Hanoi, Vietnam',
            'email' => 'contact@techsolutions.com',
            'founded_at' => '2010-05-01',
            'about' => 'Innovative technology solutions.',
            'company_type' => 'Software',
        ]);

        Employer::create([
            'company_name' => 'Google',
            'slug' => 'google',
            'logo' => 'logo.png',
            'background_img' => 'background.png',
            'company_description' => 'A leading tech company.',
            'website' => 'http://techsolutions.com',
            'contact_phone' => '0241234567',
            'address' => 'Hanoi, Vietnam',
            'email' => 'contact@techsolutions.com',
            'founded_at' => '2010-05-01',
            'about' => 'Innovative technology solutions.',
            'company_type' => 'Software',
        ]);
    }
}
