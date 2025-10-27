<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: First change the column to VARCHAR to avoid ENUM constraint issues
        DB::statement("ALTER TABLE members MODIFY COLUMN member_type VARCHAR(50)");

        // Step 2: Update any existing data to valid values
        // Convert any invalid values to 'member'
        DB::table('members')
            ->whereNotIn('member_type', ['member', 'friendship'])
            ->update(['member_type' => 'member']);

        // Also handle NULL values if any
        DB::table('members')
            ->whereNull('member_type')
            ->update(['member_type' => 'member']);

        // Step 3: Now safely set it as ENUM with correct values
        DB::statement("ALTER TABLE members MODIFY COLUMN member_type ENUM('member', 'friendship') NOT NULL DEFAULT 'member'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE members MODIFY COLUMN member_type VARCHAR(50)");
    }
};

