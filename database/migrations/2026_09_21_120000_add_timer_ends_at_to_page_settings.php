<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('page_settings', 'timer_ends_at')) {
                $table->timestamp('timer_ends_at')->nullable()->after('is_enabled');
            }
        });
    }

    public function down(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
            if (Schema::hasColumn('page_settings', 'timer_ends_at')) {
                $table->dropColumn('timer_ends_at');
            }
        });
    }
};
