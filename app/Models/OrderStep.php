<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'step_number',
        'title',
        'description',
        'icon',
        'sort_order',
    ];
}
