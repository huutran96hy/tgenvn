<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $primaryKey = 'skill_id';
    protected $fillable = ['skill_name'];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skills', 'skill_id', 'job_id');
    }
}
