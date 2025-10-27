<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('composer')->nullable();
            $table->string('arranger')->nullable();
            $table->string('genre')->nullable(); // gospel, contemporary, traditional, etc.
            $table->enum('type', ['vocal', 'instrumental'])->default('vocal');
            $table->string('audio_file')->nullable(); // Path to audio file
            $table->string('sheet_music')->nullable(); // Path to sheet music PDF
            $table->integer('duration_seconds')->nullable(); // Duration in seconds
            $table->text('lyrics')->nullable();
            $table->string('key_signature')->nullable(); // C, G, F, etc.
            $table->integer('tempo')->nullable(); // BPM
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced', 'expert'])->default('intermediate');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('plays_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
