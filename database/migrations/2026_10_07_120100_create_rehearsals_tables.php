<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rehearsals', function (Blueprint $table) {
            $table->id();
            $table->date('held_on');
            $table->string('kind', 20);
            $table->string('title')->nullable();
            $table->text('notes')->nullable();
            $table->string('status', 20)->default('open');
            $table->foreignId('taken_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('opened_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();

            $table->unique(['held_on', 'kind']);
            $table->index(['held_on', 'status']);
        });

        Schema::create('rehearsal_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rehearsal_id')->constrained('rehearsals')->cascadeOnDelete();
            $table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
            $table->string('status', 20);
            $table->string('note', 255)->nullable();
            $table->foreignId('marked_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->unique(['rehearsal_id', 'member_id']);
            $table->index(['member_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rehearsal_attendances');
        Schema::dropIfExists('rehearsals');
    }
};
