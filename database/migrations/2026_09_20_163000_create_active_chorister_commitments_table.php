<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('active_chorister_commitments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()->constrained('members')->nullOnDelete();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('voice')->nullable();
            $table->string('language', 8)->default('rw');
            $table->unsignedSmallInteger('read_seconds')->default(0);
            $table->unsignedTinyInteger('sections_read')->default(0);
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('accepted_at');
            $table->timestamps();

            $table->index('phone');
            $table->index('accepted_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('active_chorister_commitments');
    }
};
