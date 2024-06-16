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
        return $this->belongsTo(User::class, 'created_by', 'id')->select([
            'id',
            'name',
            'profile_image',
            'store_slug',
            'email_verified_at',
            'mobile_no_verified_at',
            'city_name',
            'identity_verified_at'
        ]);
    }

    function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id')->select([
            'id',
            'category_name',
            'publication_status',
        ]);
    }

    function subCategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id')->select([
            'id',
            'sub_category_name',
            'publication_status',
        ]);
    }

    function itemImage() {
        return $this->hasMany(ItemImage::class, 'item_id', 'id')->select([
            'id',
            'item_id',
            'image',
        ]);
    }

    function itemAdditionalInformation() {
        return $this->hasMany(ItemAddtionalInformation::class, 'item_id', 'id')->select([
            'id',
            'item_id',
            'title',
            'value',
        ]);
    }

    public function scopeActivePublication($query)
    {
        return $query->where('publication_status', 'active');
    }

    public function scopeOrderByDesc($query)
    {
        return $query->where('created_at', 'DESC');
    }

    public function scopeWithActiveCategory($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('publication_status', 'active');
        });
    }

    public function scopeWithActiveSubCategory($query)
    {
        return $query->whereHas('subCategory', function ($query) {
            $query->where('publication_status', 'active');
        });
    }

    public function scopeWithActiveUser($query)
    {
        return $query->whereHas('user', function ($query) {
            $query->where('publication_status', 'active');
        });
    }

    public function scopeWithVerifiedUser($query)
    {
        return $query->whereHas('user', function ($query) {
            $query->where('identity_verified_at', '!=', null);
        });
    }
}
