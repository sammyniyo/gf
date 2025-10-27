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
        Schema::create('global_site_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_coming_soon')->default(false);
            $table->string('coming_soon_title')->nullable();
            $table->text('coming_soon_message')->nullable();
            $table->date('target_date')->nullable(); // When site will launch
            $table->string('contact_email')->nullable();
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
        Schema::dropIfExists('global_site_settings');
    }
};
