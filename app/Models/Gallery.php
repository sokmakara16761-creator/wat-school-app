<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'image_url',
        'caption',
        'event_date',
        'facebook_url',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
