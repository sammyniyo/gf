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
        Schema::create('page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page_identifier'); // e.g., 'shop', 'events', 'stories'
            $table->string('page_name'); // Human-readable name
            $table->enum('status', ['active', 'coming_soon', 'maintenance', 'locked'])->default('active');
            $table->text('custom_message')->nullable(); // Custom message for the status page
            $table->string('icon')->nullable(); // Icon identifier (e.g., 'wrench', 'rocket', 'lock')
            $table->boolean('is_enabled')->default(true);
            $table->timestamps();

            $table->unique('page_identifier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_settings');
    }
};
