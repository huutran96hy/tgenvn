<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class News extends Model
{
    use HasFactory;

    protected $primaryKey = 'news_id';
    protected $fillable = [
        'title_vi',
        'title_en',
        'title_ko',
        'slug',
        'content_vi',
        'content_en',
        'content_ko',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}
