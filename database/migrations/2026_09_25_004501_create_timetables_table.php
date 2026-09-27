<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->string('grade_level'); // tri, tho, ek
            $table->string('day_of_week'); // ចន្ទ, អង្គារ, ពុធ, ព្រហស្បតិ៍, សុក្រ, សៅរ៍
            $table->string('session'); // ព្រឹក (morning), រសៀល (afternoon)
            $table->string('time_slot'); // ០៧:០០ - ០៨:០០
            $table->string('subject'); // ភាសាបាលី
            $table->string('teacher_name'); // ព្រះមហា សុវណ្ណជោតិ
            $table->string('room')->default('បន្ទប់លេខ ១'); // បន្ទប់រៀន / ធម្មសភា
            $table->integer('sort_order')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
