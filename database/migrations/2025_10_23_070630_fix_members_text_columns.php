<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Use raw SQL to avoid doctrine/dbal dependency
        DB::statement('ALTER TABLE members MODIFY COLUMN musical_experience TEXT');
        DB::statement('ALTER TABLE members MODIFY COLUMN choir_experience TEXT');
        DB::statement('ALTER TABLE members MODIFY COLUMN why_join TEXT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Use raw SQL to avoid doctrine/dbal dependency
        DB::statement('ALTER TABLE members MODIFY COLUMN musical_experience VARCHAR(255)');
        DB::statement('ALTER TABLE members MODIFY COLUMN choir_experience VARCHAR(255)');
        DB::statement('ALTER TABLE members MODIFY COLUMN why_join VARCHAR(255)');
    }
};
