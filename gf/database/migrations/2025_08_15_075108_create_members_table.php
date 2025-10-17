<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            // Unique Member ID (e.g., GF2024001, GF2024002)
            $table->string('member_id')->unique();

            // Registration Type: 'member' or 'friendship'
            $table->enum('member_type', ['member', 'friendship'])->default('member');

            // Step 1 - Personal Information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('name'); // Full name for compatibility
            $table->string('email')->unique();
            $table->string('phone', 20);
            $table->date('birthdate');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->text('address');

            // Step 2 - Professional Information
            $table->string('occupation')->nullable();
            $table->string('workplace')->nullable();
            $table->string('church')->nullable();
            $table->string('education_level')->nullable();

            // Step 3 - Choir Details (Members only)
            $table->string('voice')->nullable();                 // Soprano/Alto/Tenor/Bass/Other
            $table->string('talent')->nullable();                // Singer/Instrumentalist/...
            $table->text('musical_experience')->nullable();
            $table->text('instruments')->nullable();
            $table->text('choir_experience')->nullable();
            $table->text('why_join')->nullable();

            // Step 4 - Emergency Contact
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
            $table->string('emergency_contact_relationship')->nullable();

            // Status & Roles
            $table->enum('status', ['pending', 'active', 'inactive', 'guest'])->default('pending');
            $table->date('joined_at')->nullable();
            $table->string('roles')->nullable();     // "Conductor, Pianist"

            // Additional Information
            $table->string('hobbies')->nullable();
            $table->string('photo_path')->nullable();
            $table->text('availability')->nullable();
            $table->text('message')->nullable();
            $table->boolean('newsletter')->default(false);
            $table->text('skills')->nullable();

            // Contribution Targets
            $table->decimal('monthly_target', 10, 2)->nullable();
            $table->decimal('yearly_target', 10, 2)->nullable();

            // Admin Notes
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
