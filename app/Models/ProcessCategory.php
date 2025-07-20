<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessCategory extends Model
{
    protected $table = 'process_categories';

    protected $primaryKey = 'process_category_id';
    protected $fillable = [
        'slug',
        'category_name_vi',
        'category_name_en',
        'category_name_ko',
    ];

    public function processes()
    {
        return $this->hasMany(Process::class, 'process_category_id', 'process_category_id');
    }
}
