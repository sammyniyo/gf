<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contribution_targets', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('contribution_targets', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('contribution_targets', 'target_amount')) {
                $table->decimal('target_amount', 15, 2)->default(0);
            }
            if (!Schema::hasColumn('contribution_targets', 'current_amount')) {
                $table->decimal('current_amount', 15, 2)->default(0);
            }
            if (!Schema::hasColumn('contribution_targets', 'start_date')) {
                $table->date('start_date')->nullable();
            }
            if (!Schema::hasColumn('contribution_targets', 'end_date')) {
                $table->date('end_date')->nullable();
            }
            if (!Schema::hasColumn('contribution_targets', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
            if (!Schema::hasColumn('contribution_targets', 'is_monthly')) {
                $table->boolean('is_monthly')->default(true);
            }
        });
    }

    public function down(): void
    {
        Schema::table('contribution_targets', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'target_amount',
                'current_amount',
                'start_date',
                'end_date',
                'is_active',
                'is_monthly'
            ]);
        });
    }
};
