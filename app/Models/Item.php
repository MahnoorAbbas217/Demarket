<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'items';

    protected $fillable = [
        'created_by',
        'category_id',
        'sub_category_id',
        'item_title',
        'condition',
        'condition_description',
        'sale_type',
        'auction_duration',
        'quantity',
        'start_bidding_price',
        'buy_it_now_price',
        'shipping_price',
        'shipping_duration',
        'short_description',
        'video_url',
        'promotion',
        'promotion_price',
        'promotion_expiry',
        'publication_status'
    ];

    function user() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    function subCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    function itemImage() {
        return $this->hasMany(ItemImage::class, 'item_id', 'id');
    }

    function itemAdditionalInformation() {
        return $this->hasMany(ItemAddtionalInformation::class, 'item_id', 'id');
    }
}
