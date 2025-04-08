<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Job extends Model
{
    use HasFactory;

    protected $primaryKey = 'job_id';
    protected $fillable = [
        'employer_id',
        'job_title',
        'slug',
        'job_description',
        'requirements',
        'job_benefit',
        'salary',
        'location',
        'province_id',
        'category_id',
        'posted_date',
        'expiry_date',
        'required_education',
        'required_exp',
        'job_type',
        'is_hot',
        'approval_status',
    ];

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

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function getPostedDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getExpiryDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
