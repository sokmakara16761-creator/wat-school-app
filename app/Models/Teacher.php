<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dharma_name',
        'role',
        'title',
        'bio',
        'photo',
        'teaching_subjects',
        'phone',
        'email',
        'sort_order',
    ];
}
