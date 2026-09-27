<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('dharma_name')->nullable();
            $table->string('title'); // ឧ. ជ័យលាភីលេខ១ ប្រឡងបញ្ចប់ថ្នាក់ឯ
            $table->string('academic_year'); // ឧ. ២០២៥ - ២០២៦
            $table->string('grade_level')->nullable(); // ថ្នាក់ត្រី, ថ្នាក់ទោ, ថ្នាក់ឯ
            $table->text('description')->nullable();
            $table->integer('rank')->default(1);
            $table->string('badge')->nullable(); // ឧ. មេដាយមាស, កិត្តិយស
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
