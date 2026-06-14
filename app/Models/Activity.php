<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($activity) {
            if (empty($activity->slug)) {
                $activity->slug = Str::slug($activity->title) . '-' . uniqid();
            }
        });

        static::updating(function ($activity) {
            if ($activity->isDirty('title') && !$activity->isDirty('slug')) {
                $activity->slug = Str::slug($activity->title) . '-' . uniqid();
            }
        });
    }
}
