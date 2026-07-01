<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'process';

    protected $primaryKey = 'process_id';
    protected $fillable = [
        'process_category_id',
        'slug',
        'process_name_vi',
        'process_name_en',
        'process_name_ko',
        'description_vi',
        'description_en',
        'description_ko',
        'image',
        'content',
    ];

    public function category()
    {
        return $this->belongsTo(ProcessCategory::class, 'process_category_id', 'process_category_id');
    } 
}
