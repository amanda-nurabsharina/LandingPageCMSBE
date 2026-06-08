<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'logo',
        'whatsapp_number',
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'primary_color',
        'secondary_color',
        'accent_color',
        'background_color',
    ];
}
