<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First, update any existing "other" values to null
        DB::table('members')
            ->where('gender', 'other')
            ->update(['gender' => null]);

        // Change the enum column to string first (MySQL doesn't support direct enum modification)
        Schema::table('members', function (Blueprint $table) {
            $table->string('gender')->nullable()->change();
        });

        // Then change it back to enum with only male and female
        DB::statement("ALTER TABLE members MODIFY COLUMN gender ENUM('male', 'female') NULL");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Change back to include 'other'
        DB::statement("ALTER TABLE members MODIFY COLUMN gender ENUM('male', 'female', 'other') NULL");
    }
};
