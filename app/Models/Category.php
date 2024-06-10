<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'category_name',
        'thumbnail',
        'publication_status'
    ];

    function subCategory() {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
}
