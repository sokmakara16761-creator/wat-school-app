<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'dharma_name',
        'title',
        'academic_year',
        'grade_level',
        'description',
        'rank',
        'badge',
        'photo',
    ];
}
