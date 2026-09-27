<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_level',
        'name_kh',
        'name_en',
        'description',
        'subjects',
        'schedule_summary',
        'student_count',
        'age_range',
        'teacher_in_charge',
    ];

    protected $casts = [
        'subjects' => 'array',
    ];
}
