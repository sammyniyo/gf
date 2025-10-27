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
            // Contribution category (determines monthly target amount)
            $table->enum('contribution_category', ['student', 'alumni', 'exempt'])->default('student')->after('member_type');

            // Award tracking - for members who pay ahead
            $table->boolean('has_payment_award')->default(false)->after('contribution_category');
            $table->string('payment_award_emoji')->nullable()->after('has_payment_award'); // 🏆, 🥇, 🌟, etc.
            $table->date('paid_until_date')->nullable()->after('payment_award_emoji'); // Date they're paid until
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['contribution_category', 'has_payment_award', 'payment_award_emoji', 'paid_until_date']);
        });
    }
};
