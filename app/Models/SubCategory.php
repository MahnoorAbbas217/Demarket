<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'sub_categories';

    protected $fillable = [
        'category_id',
        'sub_category_name',
        'publication_status'
    ];

    function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
