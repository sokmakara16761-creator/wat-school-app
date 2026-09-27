<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_level',
        'day_of_week',
        'session',
        'time_slot',
        'subject',
        'teacher_name',
        'room',
        'sort_order',
    ];
}
