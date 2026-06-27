<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroCarousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge',
        'title',
        'subtitle',
        'primary_btn_text',
        'primary_btn_url',
        'secondary_btn_text',
        'secondary_btn_url',
        'carousel_images',
    ];

    protected $casts = [
        'carousel_images' => 'array',
    ];
}
