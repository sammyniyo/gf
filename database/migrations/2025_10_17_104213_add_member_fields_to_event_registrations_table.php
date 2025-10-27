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
        Schema::table('event_registrations', function (Blueprint $table) {
            // Link to member if they used member code
            $table->foreignId('member_id')->nullable()->after('event_id')->constrained('members')->nullOnDelete();

            // Track how many times this member has registered for events
            $table->unsignedInteger('member_visits_count')->default(0);

            // Allow custom amount for donations
            $table->boolean('custom_amount')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropColumn(['member_id', 'member_visits_count', 'custom_amount']);
        });
    }
};
