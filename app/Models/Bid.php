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
}
