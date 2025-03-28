<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employers';
    protected $primaryKey = 'employer_id';
    protected $fillable = ['user_id', 'company_name', 'images', 'company_description', 'website', 'contact_phone', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }
}
