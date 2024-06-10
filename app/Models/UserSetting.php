<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserSetting extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = "user_settings";

    protected $fillable = [
        'created_by',     
        'whatsapp_notification',
        'email_notification',
        'allow_whatsapp_chat',
        'web_notification',
      
    ];
}
