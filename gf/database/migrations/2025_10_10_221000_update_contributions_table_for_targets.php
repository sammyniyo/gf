<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contributions', function (Blueprint $table) {
            $table->foreignId('member_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('target_id')->nullable()->constrained('contribution_targets')->onDelete('set null');
            $table->enum('payment_type', ['monthly', 'one_time'])->default('monthly');
            $table->string('payment_method')->nullable(); // cash, bank_transfer, mobile_money, etc.
            $table->text('notes')->nullable();
            $table->boolean('is_recurring')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('contributions', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropForeign(['target_id']);
            $table->dropColumn(['member_id', 'target_id', 'payment_type', 'payment_method', 'notes', 'is_recurring']);
        });
    }
};
