<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        Skill::create([
            'skill_name' => 'PHP',
        ]);

        Skill::create([
            'skill_name' => 'JavaScript',
        ]);
    }
}