<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "memberships";

    protected $fillable = [
        'title',
        'allow_products_per_month',
        'sale_commission',
        'tax',
        'transection_charges',
        'other_charges',
        'images_allow',
        'allow_product_video',
        'withdraw_duration',
        'publication_status',
    ];
}
