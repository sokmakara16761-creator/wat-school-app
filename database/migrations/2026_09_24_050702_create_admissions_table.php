<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name');
            $table->string('dharma_name')->nullable();
            $table->string('gender')->default('ប្រុស');
            $table->date('date_of_birth')->nullable();
            $table->string('parent_name')->nullable();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('applied_grade'); // ថ្នាក់ត្រី, ថ្នាក់ទោ, ថ្នាក់ឯ
            $table->string('monk_status')->default('សមណសិស្ស (ព្រះសង្ឃ)'); // សមណសិស្ស (ព្រះសង្ឃ), កុលបុត្រ/សិស្សគ្រហស្ថ
            $table->string('previous_education')->nullable();
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
