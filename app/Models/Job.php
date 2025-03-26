<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Job extends Model
{
    use HasFactory;

    protected $primaryKey = 'job_id';
    protected $fillable = ['employer_id', 'job_title', 'job_description', 'requirements', 'salary', 'location', 'category_id', 'posted_date', 'expiry_date'];

    public function employer()
    {
        return $this->belongsTo(Employer::class, 'employer_id');
    }

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_skills', 'job_id', 'skill_id');
    }
}
