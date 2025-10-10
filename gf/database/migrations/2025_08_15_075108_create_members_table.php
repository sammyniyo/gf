<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            // Step 1
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->date('birthdate');
            $table->string('address');
            // Step 2
            $table->string('occupation')->nullable();
            $table->string('workplace')->nullable();
            $table->string('church')->nullable();
            // Step 3
            $table->string('voice');                 // Soprano/Alto/Tenor/Bass/Other
            $table->string('talent')->nullable();    // Singer/Instrumentalist/...
            $table->string('status');                // Active/Inactive/Guest
            $table->date('joined_at')->nullable();
            $table->string('roles')->nullable();     // "Conductor, Pianist"
            // Step 4
            $table->string('hobbies')->nullable();
            $table->string('photo_path')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('members');
    }
};