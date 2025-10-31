<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('page_views', function (Blueprint $table) {
            $table->boolean('is_suspicious')->default(false)->after('viewed_at');
            $table->index('is_suspicious');
        });
    }

    public function down(): void
    {
        Schema::table('page_views', function (Blueprint $table) {
            $table->dropIndex(['is_suspicious']);
            $table->dropColumn('is_suspicious');
        });
    }
};
