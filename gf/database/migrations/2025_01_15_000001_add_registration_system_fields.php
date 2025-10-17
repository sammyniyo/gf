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
        // Add fields to members table
        Schema::table('members', function (Blueprint $table) {
            if (!Schema::hasColumn('members', 'member_id')) {
                $table->string('member_id')->unique()->after('id');
            }
            if (!Schema::hasColumn('members', 'member_type')) {
                $table->enum('member_type', ['member', 'friendship'])->default('member')->after('member_id');
            }
            if (!Schema::hasColumn('members', 'first_name')) {
                $table->string('first_name')->nullable()->after('member_type');
            }
            if (!Schema::hasColumn('members', 'last_name')) {
                $table->string('last_name')->nullable()->after('first_name');
            }
            if (!Schema::hasColumn('members', 'gender')) {
                $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('address');
            }
            if (!Schema::hasColumn('members', 'emergency_contact_name')) {
                $table->string('emergency_contact_name')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('members', 'emergency_contact_phone')) {
                $table->string('emergency_contact_phone')->nullable()->after('emergency_contact_name');
            }
            if (!Schema::hasColumn('members', 'emergency_contact_relationship')) {
                $table->string('emergency_contact_relationship')->nullable()->after('emergency_contact_phone');
            }
        });

        // Add member_id to committees table
        Schema::table('committees', function (Blueprint $table) {
            if (!Schema::hasColumn('committees', 'member_id')) {
                $table->foreignId('member_id')->nullable()->after('id')->constrained('members')->nullOnDelete();
            }
        });

        // Add member_id to users table
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'member_id')) {
                $table->foreignId('member_id')->nullable()->after('id')->constrained('members')->nullOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'member_id',
                'member_type',
                'first_name',
                'last_name',
                'gender',
                'emergency_contact_name',
                'emergency_contact_phone',
                'emergency_contact_relationship'
            ]);
        });

        Schema::table('committees', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropColumn('member_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropColumn('member_id');
        });
    }
};

