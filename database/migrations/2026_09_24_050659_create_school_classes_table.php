<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_classes', function (Blueprint $table) {
            $table->id();
            $table->string('grade_level'); // tri, tho, ek (ថ្នាក់ត្រី, ថ្នាក់ទោ, ថ្នាក់ឯ)
            $table->string('name_kh'); // ពុទ្ធិកបឋមសិក្សាថ្នាក់ត្រី
            $table->string('name_en')->nullable();
            $table->text('description')->nullable();
            $table->json('subjects')->nullable(); // list of subjects
            $table->text('schedule_summary')->nullable();
            $table->integer('student_count')->default(0);
            $table->string('age_range')->nullable();
            $table->string('teacher_in_charge')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_classes');
    }
};
