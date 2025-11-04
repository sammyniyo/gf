<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            if (!Schema::hasColumn('members', 'is_active_chorister')) {
                $table->boolean('is_active_chorister')->default(false)->after('status');
            }
        });

        // Set default values: members who are active and of type 'member' should be active choristers by default
        // Friendship members should not be active choristers
        \DB::table('members')
            ->where('member_type', 'member')
            ->where('status', 'active')
            ->update(['is_active_chorister' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            if (Schema::hasColumn('members', 'is_active_chorister')) {
                $table->dropColumn('is_active_chorister');
            }
        });
    }
};
