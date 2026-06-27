<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePremium extends Model
{
    use HasFactory;

    protected $table = 'service_premiums';

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'button_text',
        'button_url',
        'sort_order',
    ];
}
