<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dharma_name')->nullable(); // ឆាយា (ឧ. ញាណរង្សី)
            $table->string('role'); // នាយកសាលា, គ្រូបង្រៀន, សមណគ្រូ
            $table->string('title')->nullable(); // ព្រះមហា, សាស្ត្រាចារ្យ, លោកគ្រូ
            $table->text('bio')->nullable();
            $table->string('photo')->nullable();
            $table->string('teaching_subjects')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
