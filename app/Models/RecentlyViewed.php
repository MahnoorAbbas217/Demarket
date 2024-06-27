<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecentlyViewed extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = "recently_vieweds";

    protected $fillable = [
        'created_by',
        'item_id',
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function scopeWithActiveItem($query)
    {
        return $query->whereHas('item', function ($query) {
            $query->whereNull('deleted_at');
        });
    }
}
