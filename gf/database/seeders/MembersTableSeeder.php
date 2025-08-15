<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    Member::create([
        'email' => 'member@example.com',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'phone' => '1234567890',
        'address' => '123 Main St, Anytown, USA',
        'occupation' => 'Software Engineer',
        'workplace' => 'Tech Company',
        'church' => 'Anytown Church',
        'talent' => 'Singing',
        'hobbies' => 'Reading, Traveling',
        'status' => 'Single',
        'join_date' => now(),
        'voice' => 'Soprano',
        'choir_roles' => 'Lead Singer',
        'birthday' => '1990-01-01',
        'photo_path' => 'path/to/photo.jpg',
        'message' => 'Hello, I am excited to be a part of the choir!',
        'is_active' => true,

    ]);
}
}