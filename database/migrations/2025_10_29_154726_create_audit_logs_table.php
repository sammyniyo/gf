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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();

            // Who performed the action
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('user_name')->nullable(); // Store name in case user is deleted
            $table->string('user_email')->nullable();

            // What was done
            $table->string('action'); // created, updated, deleted, viewed, etc.
            $table->string('auditable_type'); // Member, Event, Story, etc.
            $table->unsignedBigInteger('auditable_id')->nullable();
            $table->string('description'); // Human-readable description

            // Where it happened
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('url')->nullable();

            // What changed (for updates)
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();

            // Additional context
            $table->json('properties')->nullable(); // Any additional data
            $table->timestamps();

            // Indexes for performance
            $table->index(['auditable_type', 'auditable_id']);
            $table->index('user_id');
            $table->index('action');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
