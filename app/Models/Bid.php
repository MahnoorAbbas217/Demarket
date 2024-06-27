<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bid extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = "bids";

    protected $fillable = [
        'created_by',
        'item_id',     
        'item_detail',
        'orignal_price',
        'bid_price',     
        'bid_status',
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

    public function scopewithItemCreatedBySeller($query)
    {
        return $query->whereHas('item', function ($query) {
            $query->where('created_by', loginUserId());
        });
    }
}
