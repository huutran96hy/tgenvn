<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Config extends Model
{
    use HasFactory;

    protected $table = 'config'; 
    protected $primaryKey = 'config_id';
    protected $fillable = ['config_key', 'config_value', 'description'];
}
