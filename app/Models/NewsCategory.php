<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'news_category_id';
    protected $fillable = ['category_name', 'description'];
}
