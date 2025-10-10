<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add new columns
        if (!Schema::hasColumn('members', 'first_name')) {
            \DB::statement('ALTER TABLE members ADD COLUMN first_name VARCHAR(255) AFTER id');
        }
        if (!Schema::hasColumn('members', 'last_name')) {
            \DB::statement('ALTER TABLE members ADD COLUMN last_name VARCHAR(255) AFTER first_name');
        }

        // Rename columns using raw SQL for MariaDB compatibility
        if (Schema::hasColumn('members', 'birthdate') && !Schema::hasColumn('members', 'date_of_birth')) {
            \DB::statement('ALTER TABLE members ADD COLUMN date_of_birth DATE AFTER last_name');
            \DB::statement('UPDATE members SET date_of_birth = birthdate WHERE birthdate IS NOT NULL');
            \DB::statement('ALTER TABLE members DROP COLUMN birthdate');
        }

        if (Schema::hasColumn('members', 'voice') && !Schema::hasColumn('members', 'voice_part')) {
            \DB::statement('ALTER TABLE members ADD COLUMN voice_part VARCHAR(255) AFTER status');
            \DB::statement('UPDATE members SET voice_part = voice WHERE voice IS NOT NULL');
            \DB::statement('ALTER TABLE members DROP COLUMN voice');
        }

        if (Schema::hasColumn('members', 'photo_path') && !Schema::hasColumn('members', 'photo')) {
            \DB::statement('ALTER TABLE members ADD COLUMN photo VARCHAR(255) AFTER hobbies');
            \DB::statement('UPDATE members SET photo = photo_path WHERE photo_path IS NOT NULL');
            \DB::statement('ALTER TABLE members DROP COLUMN photo_path');
        }

        // Add address components
        if (!Schema::hasColumn('members', 'city')) {
            \DB::statement('ALTER TABLE members ADD COLUMN city VARCHAR(255) AFTER address');
        }
        if (!Schema::hasColumn('members', 'state')) {
            \DB::statement('ALTER TABLE members ADD COLUMN state VARCHAR(255) AFTER city');
        }
        if (!Schema::hasColumn('members', 'zip')) {
            \DB::statement('ALTER TABLE members ADD COLUMN zip VARCHAR(20) AFTER state');
        }

        // Add emergency contact fields
        if (!Schema::hasColumn('members', 'emergency_contact_name')) {
            \DB::statement('ALTER TABLE members ADD COLUMN emergency_contact_name VARCHAR(255) AFTER message');
        }
        if (!Schema::hasColumn('members', 'emergency_contact_phone')) {
            \DB::statement('ALTER TABLE members ADD COLUMN emergency_contact_phone VARCHAR(255) AFTER emergency_contact_name');
        }

        // Migrate name data to first_name and last_name
        \DB::statement("UPDATE members SET first_name = SUBSTRING_INDEX(name, ' ', 1), last_name = SUBSTRING_INDEX(name, ' ', -1) WHERE name IS NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name', 'city', 'state', 'zip', 'emergency_contact_name', 'emergency_contact_phone']);
            $table->renameColumn('date_of_birth', 'birthdate');
            $table->renameColumn('voice_part', 'voice');
            $table->renameColumn('photo', 'photo_path');
        });
    }
};

