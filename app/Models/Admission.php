<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_name',
        'dharma_name',
        'gender',
        'date_of_birth',
        'parent_name',
        'phone',
        'address',
        'applied_grade',
        'monk_status',
        'previous_education',
        'status',
        'notes',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];
}
