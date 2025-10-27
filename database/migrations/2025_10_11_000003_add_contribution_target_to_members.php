<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            if (!Schema::hasColumn('members', 'member_type')) {
                $table->enum('member_type', ['student', 'alumni', 'general'])->default('general')->after('status');
            }
            if (!Schema::hasColumn('members', 'monthly_target')) {
                $table->decimal('monthly_target', 10, 2)->default(0)->after('member_type');
            }
            if (!Schema::hasColumn('members', 'yearly_target')) {
                $table->decimal('yearly_target', 10, 2)->default(0)->after('monthly_target');
            }
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            if (Schema::hasColumn('members', 'member_type')) {
                $table->dropColumn('member_type');
            }
            if (Schema::hasColumn('members', 'monthly_target')) {
                $table->dropColumn('monthly_target');
            }
            if (Schema::hasColumn('members', 'yearly_target')) {
                $table->dropColumn('yearly_target');
            }
        });
    }
};
