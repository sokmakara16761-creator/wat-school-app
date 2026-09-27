<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('preacher')->default('ព្រះសង្ឃវត្តព្រៃស្ដី');
            $table->string('category')->default('ធម្មទេសនា');
            $table->string('youtube_id');
            $table->string('youtube_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->string('duration')->default('30:00');
            $table->boolean('is_live')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('views')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
