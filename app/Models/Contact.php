<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Contact extends Model
{
    use HasFactory;

    protected $primaryKey = 'contact_id';
    protected $fillable = ['full_name', 'email', 'phone', 'subject', 'message'];
}
