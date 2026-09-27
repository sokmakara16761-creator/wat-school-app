<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dhammas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('preacher')->nullable(); // ព្រះសង្ឃទេសនា / អ្នកនិពន្ធ
            $table->string('category')->default('ធម៌អប់រំចិត្ត'); // ធម៌អប់រំចិត្ត, វិន័យសង្ឃ, ពុទ្ធប្រវត្តិ, គតិលោក
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('audio_url')->nullable();
            $table->string('duration')->nullable(); // e.g. 25:30
            $table->integer('read_time')->default(5); // in minutes
            $table->integer('views')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dhammas');
    }
};
