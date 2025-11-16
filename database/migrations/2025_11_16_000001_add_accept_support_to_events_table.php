<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('events', 'accept_support')) {
            Schema::table('events', function (Blueprint $table) {
                $table->boolean('accept_support')->nullable()->after('cover_image');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('events', 'accept_support')) {
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('accept_support');
            });
        }
    }
};


