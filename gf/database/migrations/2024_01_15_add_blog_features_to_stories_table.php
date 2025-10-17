<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('stories', function (Blueprint $table) {
            // Check and add slug if not exists (it already exists in your table)
            if (!Schema::hasColumn('stories', 'slug')) {
                $table->string('slug')->unique()->after('title');
            }

            // Check and modify excerpt (already exists but might need to be text)
            if (!Schema::hasColumn('stories', 'excerpt')) {
                $table->text('excerpt')->nullable()->after('content');
            }

            // Check and add featured_image if not exists (already exists)
            if (!Schema::hasColumn('stories', 'featured_image')) {
                $table->string('featured_image')->nullable()->after('excerpt');
            }

            // Check and modify category (already exists)
            if (!Schema::hasColumn('stories', 'category')) {
                $table->string('category')->default('general')->after('featured_image');
            }

            // NEW COLUMNS - These don't exist yet
            $table->json('tags')->nullable()->after('category');

            // Reading Stats
            $table->integer('reading_time')->default(0)->after('tags'); // in minutes
            $table->integer('views_count')->default(0)->after('reading_time');
            $table->integer('likes_count')->default(0)->after('views_count');

            // Author & Publishing
            $table->foreignId('author_id')->nullable()->after('likes_count')->constrained('users')->nullOnDelete();
            $table->enum('status', ['draft', 'published', 'archived'])->default('published')->after('author_id');

            // SEO
            $table->string('meta_title')->nullable()->after('status');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->json('meta_keywords')->nullable()->after('meta_description');

            // Additional Features
            $table->boolean('is_featured')->default(false)->after('meta_keywords');
            $table->boolean('allow_comments')->default(true)->after('is_featured');
            $table->integer('comment_count')->default(0)->after('allow_comments');
        });

        // Migrate existing data from is_published to status
        DB::statement("UPDATE stories SET status = CASE WHEN is_published = 1 THEN 'published' ELSE 'draft' END");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stories', function (Blueprint $table) {
            // Only drop the NEW columns we added
            $table->dropColumn([
                'tags',
                'reading_time',
                'views_count',
                'likes_count',
                'author_id',
                'status',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'is_featured',
                'allow_comments',
                'comment_count'
            ]);

            // Note: We keep slug, excerpt, featured_image, category, published_at
            // as they already existed in the original table
        });
    }
};
