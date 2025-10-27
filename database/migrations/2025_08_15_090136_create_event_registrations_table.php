<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->nullableMorphs('registrant');
            $table->string('name');
            $table->string('email')->index();
            $table->string('phone', 20)->nullable();
            $table->unsignedBigInteger('amount_offered')->default(0); // RWF
            $table->string('ticket_code')->unique(); // e.g. ULID
            $table->string('status')->default('REGISTERED');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('event_registrations'); }
};
