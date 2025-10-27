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
        // Check if events table has the old columns and update accordingly
        if (Schema::hasColumn('events', 'title') && !Schema::hasColumn('events', 'name')) {
            \DB::statement('ALTER TABLE events ADD COLUMN name VARCHAR(255) AFTER id');
            \DB::statement('UPDATE events SET name = title WHERE title IS NOT NULL');
            \DB::statement('ALTER TABLE events DROP COLUMN title');
        }

        if (Schema::hasColumn('events', 'cover_image') && !Schema::hasColumn('events', 'image')) {
            \DB::statement('ALTER TABLE events ADD COLUMN image VARCHAR(255) AFTER is_public');
            \DB::statement('UPDATE events SET image = cover_image WHERE cover_image IS NOT NULL');
            \DB::statement('ALTER TABLE events DROP COLUMN cover_image');
        }

        if (Schema::hasColumn('events', 'capacity') && !Schema::hasColumn('events', 'max_attendees')) {
            \DB::statement('ALTER TABLE events ADD COLUMN max_attendees INT UNSIGNED AFTER location');
            \DB::statement('UPDATE events SET max_attendees = capacity WHERE capacity IS NOT NULL');
            \DB::statement('ALTER TABLE events DROP COLUMN capacity');
        }

        if (!Schema::hasColumn('events', 'date')) {
            \DB::statement('ALTER TABLE events ADD COLUMN date DATE AFTER description');
            \DB::statement('UPDATE events SET date = DATE(start_at) WHERE start_at IS NOT NULL');
        }

        if (!Schema::hasColumn('events', 'time')) {
            \DB::statement('ALTER TABLE events ADD COLUMN time TIME AFTER date');
            \DB::statement('UPDATE events SET time = TIME(start_at) WHERE start_at IS NOT NULL');
        }

        // Update event_registrations table
        if (Schema::hasColumn('event_registrations', 'ticket_code') && !Schema::hasColumn('event_registrations', 'registration_code')) {
            \DB::statement('ALTER TABLE event_registrations ADD COLUMN registration_code VARCHAR(255) UNIQUE AFTER phone');
            \DB::statement('UPDATE event_registrations SET registration_code = ticket_code WHERE ticket_code IS NOT NULL');
            \DB::statement('ALTER TABLE event_registrations DROP COLUMN ticket_code');
        }

        if (Schema::hasColumn('event_registrations', 'amount_offered') && !Schema::hasColumn('event_registrations', 'total_amount')) {
            \DB::statement('ALTER TABLE event_registrations ADD COLUMN total_amount BIGINT UNSIGNED DEFAULT 0 AFTER phone');
            \DB::statement('UPDATE event_registrations SET total_amount = amount_offered WHERE amount_offered IS NOT NULL');
            \DB::statement('ALTER TABLE event_registrations DROP COLUMN amount_offered');
        }

        if (!Schema::hasColumn('event_registrations', 'tickets')) {
            \DB::statement('ALTER TABLE event_registrations ADD COLUMN tickets INT UNSIGNED DEFAULT 1 AFTER phone');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert events table
        \DB::statement('ALTER TABLE events ADD COLUMN title VARCHAR(255) AFTER id');
        \DB::statement('ALTER TABLE events ADD COLUMN cover_image VARCHAR(255) AFTER is_public');
        \DB::statement('ALTER TABLE events ADD COLUMN capacity INT UNSIGNED AFTER location');

        \DB::statement('UPDATE events SET title = name WHERE name IS NOT NULL');
        \DB::statement('UPDATE events SET cover_image = image WHERE image IS NOT NULL');
        \DB::statement('UPDATE events SET capacity = max_attendees WHERE max_attendees IS NOT NULL');

        \DB::statement('ALTER TABLE events DROP COLUMN name, DROP COLUMN image, DROP COLUMN max_attendees, DROP COLUMN date, DROP COLUMN time');

        // Revert event_registrations table
        \DB::statement('ALTER TABLE event_registrations ADD COLUMN ticket_code VARCHAR(255) UNIQUE AFTER phone');
        \DB::statement('ALTER TABLE event_registrations ADD COLUMN amount_offered BIGINT UNSIGNED DEFAULT 0 AFTER phone');

        \DB::statement('UPDATE event_registrations SET ticket_code = registration_code WHERE registration_code IS NOT NULL');
        \DB::statement('UPDATE event_registrations SET amount_offered = total_amount WHERE total_amount IS NOT NULL');

        \DB::statement('ALTER TABLE event_registrations DROP COLUMN registration_code, DROP COLUMN total_amount, DROP COLUMN tickets');
    }
};

