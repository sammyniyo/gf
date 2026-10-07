<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
            if (! Schema::hasColumn('page_settings', 'join_url')) {
                $table->string('join_url', 500)->nullable()->after('timer_ends_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('page_settings', function (Blueprint $table) {
            if (Schema::hasColumn('page_settings', 'join_url')) {
                $table->dropColumn('join_url');
            }
        });
    }
};
