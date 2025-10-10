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
            // Add new fields for comprehensive member registration - check if they don't exist first
            if (!Schema::hasColumn('members', 'gender')) {
                $table->string('gender')->nullable()->after('date_of_birth');
            }
            if (!Schema::hasColumn('members', 'workplace')) {
                $table->string('workplace')->nullable()->after('occupation');
            }
            if (!Schema::hasColumn('members', 'education_level')) {
                $table->enum('education_level', ['primary', 'secondary', 'diploma', 'bachelor', 'master', 'phd', 'other'])->nullable()->after('workplace');
            }
            if (!Schema::hasColumn('members', 'skills')) {
                $table->text('skills')->nullable()->after('education_level');
            }

            // Choir-specific fields
            if (!Schema::hasColumn('members', 'voice_type')) {
                $table->enum('voice_type', ['soprano', 'alto', 'tenor', 'bass', 'unsure'])->nullable()->after('skills');
            }
            if (!Schema::hasColumn('members', 'musical_experience')) {
                $table->enum('musical_experience', ['beginner', 'intermediate', 'advanced', 'professional'])->nullable()->after('voice_type');
            }
            if (!Schema::hasColumn('members', 'instruments')) {
                $table->string('instruments')->nullable()->after('musical_experience');
            }
            if (!Schema::hasColumn('members', 'choir_experience')) {
                $table->enum('choir_experience', ['none', 'school', 'church', 'community', 'professional'])->nullable()->after('instruments');
            }
            if (!Schema::hasColumn('members', 'why_join')) {
                $table->text('why_join')->nullable()->after('choir_experience');
            }

            // Additional fields
            if (!Schema::hasColumn('members', 'availability')) {
                $table->enum('availability', ['weekends', 'evenings', 'flexible', 'limited'])->nullable()->after('why_join');
            }
            if (!Schema::hasColumn('members', 'profile_photo')) {
                $table->string('profile_photo')->nullable()->after('availability');
            }
            if (!Schema::hasColumn('members', 'newsletter')) {
                $table->boolean('newsletter')->default(false)->after('profile_photo');
            }
            if (!Schema::hasColumn('members', 'status')) {
                $table->enum('status', ['pending', 'active', 'inactive'])->default('pending')->after('newsletter');
            }
            if (!Schema::hasColumn('members', 'notes')) {
                $table->text('notes')->nullable()->after('status');
            }
        });

        // Update existing records to have pending status if column exists
        if (Schema::hasColumn('members', 'status')) {
            DB::table('members')->whereNull('status')->update(['status' => 'pending']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            // Drop new columns
            $table->dropColumn([
                'gender',
                'workplace',
                'education_level',
                'skills',
                'voice_type',
                'musical_experience',
                'instruments',
                'choir_experience',
                'why_join',
                'availability',
                'profile_photo',
                'newsletter',
                'status',
                'notes'
            ]);

            // Restore original column name
            $table->renameColumn('voice_type_old', 'voice_part');
        });
    }
};
