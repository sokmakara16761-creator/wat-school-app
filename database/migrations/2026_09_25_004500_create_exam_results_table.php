<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->string('student_id')->index(); // e.g. PSD-2026-001
            $table->string('student_name'); // e.g. សមណសិស្ស កែវ ចាន់ធឿន
            $table->string('dharma_name')->nullable(); // e.g. ធម្មរង្សី
            $table->string('gender')->default('ប្រុស');
            $table->string('grade_level'); // tri, tho, ek (ថ្នាក់ត្រី, ថ្នាក់ទោ, ថ្នាក់ឯ)
            $table->string('academic_year')->default('២០២៥ - ២០២៦');
            $table->string('exam_type'); // ឆមាសទី១, ឆមាសទី២, ប្រឡងបញ្ចប់ឆ្នាំ
            $table->json('scores'); // array of [{subject, score, max_score, teacher_notes}]
            $table->decimal('total_score', 8, 2);
            $table->decimal('max_total', 8, 2)->default(600);
            $table->decimal('average', 5, 2);
            $table->integer('rank');
            $table->string('grade_mention'); // ល្អប្រសើរ (A), ល្អណាស់ (B), ល្អ (C), ល្អបង្គួរ (D), មធ្យម (E)
            $table->string('status')->default('ជាប់'); // ជាប់, ធ្លាក់
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_results');
    }
};
