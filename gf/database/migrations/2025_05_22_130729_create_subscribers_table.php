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
        Schema::create('subscribers', function (Blueprint $table) {
    $table->id();
    $table->string('email')->unique();
    $table->string('name')->nullable();
    $table->enum('type', ['Fan', 'Member', 'Church'])->default('Fan');
    $table->boolean('receives_newsletter')->default(true);
    $table->boolean('receives_event_updates')->default(false);
    $table->ipAddress('signup_ip')->nullable();
    $table->timestamp('subscribed_at')->useCurrent();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
};