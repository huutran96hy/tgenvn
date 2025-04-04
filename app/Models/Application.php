<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Application extends Model
{
    use HasFactory;

    protected $primaryKey = 'application_id';
    protected $fillable = ['candidate_id', 'job_id', 'application_date', 'status'];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function getApplicationDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
