<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contributions', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('contributions', 'target_id')) {
                $table->foreignId('target_id')->nullable()->after('member_id')->constrained('contribution_targets')->onDelete('set null');
            }
            if (!Schema::hasColumn('contributions', 'payment_type')) {
                $table->enum('payment_type', ['monthly', 'one_time'])->default('monthly')->after('payment_method');
            }
            if (!Schema::hasColumn('contributions', 'is_recurring')) {
                $table->boolean('is_recurring')->default(false)->after('notes');
            }
        });
    }

    public function down(): void
    {
        Schema::table('contributions', function (Blueprint $table) {
            if (Schema::hasColumn('contributions', 'target_id')) {
                $table->dropForeign(['target_id']);
                $table->dropColumn('target_id');
            }
            if (Schema::hasColumn('contributions', 'payment_type')) {
                $table->dropColumn('payment_type');
            }
            if (Schema::hasColumn('contributions', 'is_recurring')) {
                $table->dropColumn('is_recurring');
            }
        });
    }
};
