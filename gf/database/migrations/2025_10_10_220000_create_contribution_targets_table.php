<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contribution_targets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Students 2024", "Alumni 2024"
            $table->string('type'); // 'student', 'alumni', 'general'
            $table->text('description')->nullable();
            $table->decimal('target_amount', 15, 2); // Target amount for this group
            $table->decimal('current_amount', 15, 2)->default(0); // Current collected amount
            $table->date('start_date'); // When this target period starts
            $table->date('end_date'); // When this target period ends
            $table->boolean('is_active')->default(true);
            $table->boolean('is_monthly')->default(true); // true for monthly targets, false for one-time
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contribution_targets');
    }
};
