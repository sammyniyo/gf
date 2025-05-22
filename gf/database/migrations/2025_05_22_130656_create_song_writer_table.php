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
        Schema::create('song_writer', function (Blueprint $table) {
    $table->foreignId('song_id')->constrained();
    $table->foreignId('member_id')->constrained(); // If writer is a member
    $table->string('external_writer')->nullable(); // For non-member writers
    $table->text('contribution')->nullable(); // e.g., "Wrote chorus"
    $table->primary(['song_id', 'member_id']);
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song_writer');
    }
};
