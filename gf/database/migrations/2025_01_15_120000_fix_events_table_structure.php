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
        // Check if events table has the old columns and update accordingly
        if (Schema::hasColumn('events', 'title') && !Schema::hasColumn('events', 'name')) {
            Schema::table('events', function (Blueprint $table) {
                $table->string('name')->after('id');
            });

            // Copy data from title to name
            DB::statement('UPDATE events SET name = title WHERE title IS NOT NULL');

            // Drop the old title column
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('title');
            });
        }

        if (Schema::hasColumn('events', 'cover_image') && !Schema::hasColumn('events', 'image')) {
            Schema::table('events', function (Blueprint $table) {
                $table->string('image')->nullable()->after('is_public');
            });

            // Copy data from cover_image to image
            DB::statement('UPDATE events SET image = cover_image WHERE cover_image IS NOT NULL');

            // Drop the old cover_image column
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('cover_image');
            });
        }

        if (Schema::hasColumn('events', 'capacity') && !Schema::hasColumn('events', 'max_attendees')) {
            Schema::table('events', function (Blueprint $table) {
                $table->unsignedInteger('max_attendees')->nullable()->after('location');
            });

            // Copy data from capacity to max_attendees
            DB::statement('UPDATE events SET max_attendees = capacity WHERE capacity IS NOT NULL');

            // Drop the old capacity column
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('capacity');
            });
        }

        if (!Schema::hasColumn('events', 'date')) {
            Schema::table('events', function (Blueprint $table) {
                $table->date('date')->after('description');
            });

            // Copy date from start_at
            DB::statement('UPDATE events SET date = DATE(start_at) WHERE start_at IS NOT NULL');
        }

        if (!Schema::hasColumn('events', 'time')) {
            Schema::table('events', function (Blueprint $table) {
                $table->time('time')->after('date');
            });

            // Copy time from start_at
            DB::statement('UPDATE events SET time = TIME(start_at) WHERE start_at IS NOT NULL');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert events table
        Schema::table('events', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('cover_image')->nullable()->after('is_public');
            $table->unsignedInteger('capacity')->nullable()->after('location');
        });

        // Copy data back
        DB::statement('UPDATE events SET title = name WHERE name IS NOT NULL');
        DB::statement('UPDATE events SET cover_image = image WHERE image IS NOT NULL');
        DB::statement('UPDATE events SET capacity = max_attendees WHERE max_attendees IS NOT NULL');

        // Drop the new columns
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['name', 'image', 'max_attendees', 'date', 'time']);
        });
    }
};
