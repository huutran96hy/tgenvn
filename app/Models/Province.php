<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ['name', 'type', 'region'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'province_id');
    }
}
