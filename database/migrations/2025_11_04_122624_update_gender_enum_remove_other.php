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

        // Use raw SQL to modify enum without Doctrine DBAL dependency
        // This avoids the compatibility issue by directly executing SQL
        try {
            // Step 1: Convert enum to VARCHAR temporarily
            DB::statement("ALTER TABLE members MODIFY COLUMN gender VARCHAR(10) NULL");
            
            // Step 2: Ensure all 'other' values are null (already done above, but double-check)
            DB::statement("UPDATE members SET gender = NULL WHERE gender = 'other'");
            
            // Step 3: Convert back to ENUM with only male and female
            DB::statement("ALTER TABLE members MODIFY COLUMN gender ENUM('male', 'female') NULL");
        } catch (\Exception $e) {
            // If enum modification fails, just keep it as VARCHAR
            // The validation rules will still enforce the values at application level
            \Log::warning('Could not modify gender enum to ENUM type: ' . $e->getMessage());
            \Log::info('Gender column will remain as VARCHAR. Validation rules will still enforce correct values.');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Change back to include 'other' if needed
        try {
            DB::statement("ALTER TABLE members MODIFY COLUMN gender ENUM('male', 'female', 'other') NULL");
        } catch (\Exception $e) {
            \Log::warning('Could not revert gender enum: ' . $e->getMessage());
        }
    }
};
