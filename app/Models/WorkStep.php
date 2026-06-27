<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStep extends Model
{
    use HasFactory;

    protected $table = 'work_steps';

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'sort_order',
    ];
}
