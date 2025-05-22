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
        Schema::create('members', function (Blueprint $table) {
    $table->id();
    $table->string('email')->unique();
    $table->string('first_name');
    $table->string('last_name');
    $table->string('phone')->nullable();
    $table->text('address')->nullable();
    $table->string('occupation')->nullable();
    $table->string('workplace')->nullable();
    $table->string('church')->nullable();
    $table->string('talent')->nullable();
    $table->string('hobbies')->nullable();
    $table->enum('status', ['Single', 'Married', 'Divorced', 'Widowed'])->default('Single');
    $table->date('join_date');
    $table->enum('voice', ['Soprano', 'Alto', 'Tenor', 'Bass', 'Baritone', 'Mezzo-Soprano'])->nullable();
    $table->string('choir_roles')->nullable();
    $table->date('birthday')->nullable();
    $table->string('photo_path')->nullable();
    $table->text('message')->nullable();
    $table->boolean('is_active')->default(true);
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
