<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageSettings;

class PageSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'page_identifier' => 'shop',
                'page_name' => 'Shop',
                'status' => 'active',
                'custom_message' => null,
                'icon' => 'shopping-bag',
                'is_enabled' => true,
            ],
            [
                'page_identifier' => 'events',
                'page_name' => 'Events',
                'status' => 'active',
                'custom_message' => null,
                'icon' => 'calendar',
                'is_enabled' => true,
            ],
            [
                'page_identifier' => 'stories',
                'page_name' => 'Stories',
                'status' => 'active',
                'custom_message' => null,
                'icon' => 'book-open',
                'is_enabled' => true,
            ],
            [
                'page_identifier' => 'devotions',
                'page_name' => 'Devotions',
                'status' => 'active',
                'custom_message' => null,
                'icon' => 'book-open',
                'is_enabled' => true,
            ],
            [
                'page_identifier' => 'committee',
                'page_name' => 'Committee',
                'status' => 'active',
                'custom_message' => null,
                'icon' => 'users',
                'is_enabled' => true,
            ],
        ];

        foreach ($pages as $page) {
            PageSettings::firstOrCreate(
                ['page_identifier' => $page['page_identifier']],
                $page
            );
        }
    }
}

