<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('meeting_date');
            $table->string('location')->nullable();
            $table->string('meeting_link')->nullable(); // For virtual meetings
            $table->enum('attendee_type', ['committee', 'all_members', 'custom'])->default('committee');
            $table->json('custom_attendees')->nullable(); // Array of member IDs
            $table->boolean('email_sent')->default(false);
            $table->timestamp('email_sent_at')->nullable();
            $table->timestamps();
        });

        Schema::create('meeting_attendees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained()->onDelete('cascade');
            $table->foreignId('member_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('email');
            $table->string('name');
            $table->boolean('invitation_sent')->default(false);
            $table->boolean('attended')->default(false);
            $table->timestamps();

            $table->unique(['meeting_id', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meeting_attendees');
        Schema::dropIfExists('meetings');
    }
};


