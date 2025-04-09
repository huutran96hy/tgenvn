<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPosition extends Model
{
    protected $table = 'company_position';
    protected $fillable = ['name'];

    public function jobs()
    {
        return $this->hasMany(Job::class, 'position_id');
    }
}
