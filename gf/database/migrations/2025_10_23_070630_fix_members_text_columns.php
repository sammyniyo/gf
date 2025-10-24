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
        Schema::table('members', function (Blueprint $table) {
            // Change musical_experience to text if it's not already
            $table->text('musical_experience')->change();
            // Change choir_experience to text if it's not already
            $table->text('choir_experience')->change();
            // Change why_join to text if it's not already
            $table->text('why_join')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            // Revert back to string columns
            $table->string('musical_experience')->change();
            $table->string('choir_experience')->change();
            $table->string('why_join')->change();
        });
    }
};
