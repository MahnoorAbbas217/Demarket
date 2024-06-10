<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemImage extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $table = 'item_images';

    protected $fillable = [
        'created_by',
        'item_id',
        'image',
    ];
}
