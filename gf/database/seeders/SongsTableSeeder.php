<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Songs::create([
            'id' => 1,
            'title' => 'Amazing Grace',
            'lyrics' => 'Amazing grace! How sweet the sound...',
            'composer' => 'John Newton',
            'arranger' => 'Unknown',
            'release_date' => now(),
            'genre' => 'Gospel',
            'duration' => 300,
            'is_active' => true,
        ]);

    }
}
