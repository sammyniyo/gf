<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('lyrics')->nullable();
    $table->text('story')->nullable(); // Inspiration behind the song
    $table->year('release_year');
    $table->string('scripture_reference')->nullable(); // e.g., "Psalm 150:6"
    $table->string('youtube_id')->nullable(); // Embed ID
    $table->string('spotify_link')->nullable();
    $table->string('cover_image')->nullable();
    $table->boolean('is_featured')->default(false);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
};