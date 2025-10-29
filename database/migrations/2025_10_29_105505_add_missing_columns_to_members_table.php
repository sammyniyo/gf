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
        Schema::table('members', function (Blueprint $table) {
            // Add date_of_birth as alias for birthdate (some forms might use this)
            if (!Schema::hasColumn('members', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable()->after('birthdate');
            }

            // Add contribution-related columns
            if (!Schema::hasColumn('members', 'contribution_category')) {
                $table->enum('contribution_category', ['student', 'alumni', 'exempt'])->default('student')->after('yearly_target');
            }

            if (!Schema::hasColumn('members', 'has_payment_award')) {
                $table->boolean('has_payment_award')->default(false)->after('contribution_category');
            }

            if (!Schema::hasColumn('members', 'payment_award_emoji')) {
                $table->string('payment_award_emoji', 10)->nullable()->after('has_payment_award');
            }

            if (!Schema::hasColumn('members', 'paid_until_date')) {
                $table->date('paid_until_date')->nullable()->after('payment_award_emoji');
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
                'date_of_birth',
                'contribution_category',
                'has_payment_award',
                'payment_award_emoji',
                'paid_until_date',
            ]);
        });
    }
};
