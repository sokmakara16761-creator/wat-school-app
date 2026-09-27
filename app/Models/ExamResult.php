<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'student_name',
        'dharma_name',
        'gender',
        'grade_level',
        'academic_year',
        'exam_type',
        'scores',
        'total_score',
        'max_total',
        'average',
        'rank',
        'grade_mention',
        'status',
        'remarks',
    ];

    protected $casts = [
        'scores' => 'array',
        'total_score' => 'float',
        'max_total' => 'float',
        'average' => 'float',
        'rank' => 'integer',
    ];

    public function getGradeLevelKhAttribute()
    {
        return match ($this->grade_level) {
            'tri', 'ថ្នាក់ត្រី' => 'ពុទ្ធិកថ្នាក់ត្រី (កម្រិតទី១)',
            'tho', 'ថ្នាក់ទោ' => 'ពុទ្ធិកថ្នាក់ទោ (កម្រិតទី២)',
            'ek', 'ថ្នាក់ឯ' => 'ពុទ្ធិកថ្នាក់ឯ (កម្រិតទី៣)',
            default => $this->grade_level,
        };
    }
}
