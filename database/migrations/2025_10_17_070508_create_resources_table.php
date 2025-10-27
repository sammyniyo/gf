<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('category', [
                'lyrics',           // PDF Lyrics
                'music_sheets',     // Music Sheets
                'code_of_conduct',  // Code of Conduct
                'announcements',    // Written Announcements
                'uniforms',         // Uniform Images
                'other'             // Other documents
            ]);
            $table->string('file_path');      // Path to the uploaded file
            $table->string('file_type', 10);  // pdf, doc, jpg, png, etc.
            $table->integer('file_size')->nullable(); // Size in KB
            $table->string('uploaded_by')->nullable(); // Admin username
            $table->boolean('is_active')->default(true);
            $table->integer('downloads')->default(0);
            $table->timestamps();

            $table->index('category');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
};
