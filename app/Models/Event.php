<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'location',
        'start_date',
        'end_date',
        'lunar_date',
        'is_upcoming',
        'image'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_upcoming' => 'boolean',
    ];
}
