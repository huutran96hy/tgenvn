<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employers';
    protected $primaryKey = 'employer_id';
    protected $fillable = [
        'user_id',
        'company_name',
        'slug',
        'logo',
        'background_img',
        'images',
        'company_description',
        'employer_benefit',
        'website',
        'contact_phone',
        'address',
        'email',
        'founded_at',
        'about',
        'company_type',
        'map_url',
        'is_hot'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo
            ? \App\Helpers\CustomHelper::logoSrc($this->logo)
            : asset('assets/imgs/template/logo.svg');
    }

    public function getFoundedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
