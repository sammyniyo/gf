<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;

class StorySeeder extends Seeder
{
    public function run()
    {
        $stories = [
            [
                'title' => 'The Birth of Our Choir: A Dream Realized',
                'slug' => 'birth-of-our-choir-dream-realized',
                'content' => 'It all began with a simple dream in the heart of our founding director, Sarah Johnson. She had a vision of bringing together voices from all walks of life to create something beautiful for God. What started as a small group of eight people meeting in her living room has grown into a vibrant community of over 50 dedicated singers.

The early days were filled with challenges. We had no formal rehearsal space, so we practiced in church basements, community centers, and sometimes even in members\' homes. But what we lacked in resources, we made up for in passion and determination.

Our first public performance was at a local nursing home, where we sang Christmas carols for the residents. The joy on their faces as we sang "Silent Night" confirmed that we were on the right path. That moment of connection between our music and their hearts showed us the true power of what we were creating together.

From those humble beginnings, our choir has grown to perform at major venues, record albums, and most importantly, touch countless lives through the gift of music. But we never forget where we started - with a dream, a few voices, and a whole lot of faith.',
                'category' => 'founding',
                'is_published' => true,
                'published_at' => now(),
                'event_date' => '2015-03-15',
                'location' => 'First United Methodist Church, Downtown',
            ],
            [
                'title' => 'The Miracle at Carnegie Hall',
                'slug' => 'miracle-at-carnegie-hall',
                'content' => 'When we received the invitation to perform at Carnegie Hall, we thought it was a mistake. A small community choir from our town? Surely they meant someone else. But the invitation was real, and it came with a challenge that would test everything we believed about ourselves.

The performance was scheduled for Easter Sunday, and we were asked to perform a challenging piece that required perfect harmony and timing. For months, we rehearsed tirelessly, often staying late into the night to perfect every note, every phrase, every breath.

The day of the performance arrived, and as we stood on that legendary stage, we were overwhelmed with emotion. But then something miraculous happened. As we began to sing, our individual voices disappeared, and we became one voice - pure, powerful, and filled with the Spirit.

The audience gave us a standing ovation, but more importantly, we felt God\'s presence in that moment. We realized that we weren\'t just singing for Carnegie Hall; we were singing for Him. And in that realization, we found our true purpose.

That night changed everything for our choir. We learned that when we surrender our individual talents to God\'s service, He can use us to create something truly extraordinary.',
                'category' => 'milestone',
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'event_date' => '2019-04-21',
                'location' => 'Carnegie Hall, New York',
            ],
            [
                'title' => 'The Song That Healed a Broken Heart',
                'slug' => 'song-that-healed-broken-heart',
                'content' => 'Sometimes the most powerful stories aren\'t about grand performances or major achievements, but about the quiet moments when music touches a single heart in a profound way.

Last year, we were performing at a local hospital during the holiday season. Among the patients was an elderly man named Robert, who had been struggling with depression after losing his wife of 50 years. He had been withdrawn and unresponsive to most visitors.

As we began to sing "Amazing Grace," something remarkable happened. Robert, who hadn\'t spoken in weeks, began to sing along. His voice was weak and shaky, but it was filled with emotion and memory. By the end of the song, tears were streaming down his face, and he was smiling for the first time in months.

After our performance, Robert asked us to visit him regularly. We would sing his favorite hymns, and he would share stories about his wife and their life together. Through our music, we helped him find peace and healing in his grief.

This experience taught us that our ministry isn\'t just about perfect performances or beautiful venues. It\'s about being present for people in their darkest moments and using our gifts to bring light, hope, and healing to those who need it most.',
                'category' => 'ministry',
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'event_date' => '2023-12-15',
                'location' => 'St. Mary\'s Hospital, Community Wing',
            ],
            [
                'title' => 'The Storm That Strengthened Our Bond',
                'slug' => 'storm-that-strengthened-our-bond',
                'content' => 'Life has a way of testing our faith and our commitment to each other. For our choir, that test came in the form of a devastating storm that hit our community just days before our biggest performance of the year.

The storm damaged our rehearsal space, destroyed some of our music, and left many of our members dealing with personal losses. We could have easily cancelled the performance, and no one would have blamed us. But something remarkable happened instead.

Members who had lost power opened their homes for rehearsals. Those who had lost their music shared what they had with others. People who were dealing with their own storm damage still showed up to practice, because they knew that our music could bring comfort to others who were suffering.

The night of the performance, we sang with a depth and emotion we had never experienced before. Every note carried the weight of our shared struggle and our shared hope. The audience felt it too - there wasn\'t a dry eye in the house.

That storm taught us that our choir isn\'t just about making beautiful music; it\'s about being a family that supports each other through life\'s challenges. It\'s about finding strength in unity and hope in harmony.',
                'category' => 'community',
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'event_date' => '2022-09-10',
                'location' => 'Community Center, Main Hall',
            ],
        ];

        foreach ($stories as $story) {
            Story::create($story);
        }
    }
}
