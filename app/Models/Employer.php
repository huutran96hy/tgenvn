<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employers';
    protected $primaryKey = 'employer_id';
    protected $fillable = [
        'user_id',
        'company_name',
        'logo',
        'background_img',
        'company_description',
        'website',
        'contact_phone',
        'address',
        'email',
        'founded_at',
        'about',
        'company_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }
}
