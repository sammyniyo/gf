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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'registration', 'member', 'contact', 'contribution', etc.
            $table->string('title');
            $table->text('message');
            $table->string('icon')->nullable(); // Icon class or name
            $table->string('color')->default('blue'); // Color theme
            $table->string('action_url')->nullable(); // Link to related resource
            $table->string('action_text')->nullable(); // Button text
            $table->boolean('is_read')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Specific user or null for all admins
            $table->json('data')->nullable(); // Additional data
            $table->timestamps();

            $table->index(['is_read', 'created_at']);
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};

