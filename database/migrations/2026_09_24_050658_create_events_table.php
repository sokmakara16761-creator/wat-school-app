<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('location')->default('សាលាឆាន់ និងព្រះវិហារវត្ត');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('lunar_date')->nullable(); // e.g. ថ្ងៃ ១៥ កើត ខែមាឃ ឆ្នាំរោង ឆស័ក ព.ស. ២៥៦៨
            $table->boolean('is_upcoming')->default(true);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
