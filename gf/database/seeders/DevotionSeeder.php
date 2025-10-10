<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Devotion;

class DevotionSeeder extends Seeder
{
    public function run()
    {
        $devotions = [
            [
                'title' => 'The Power of Unity in Song',
                'slug' => 'power-of-unity-in-song',
                'content' => 'When we come together as a choir, we create something greater than the sum of our individual voices. Each voice, unique in its own way, blends harmoniously to create a beautiful melody that touches hearts and souls. This unity reminds us that we are stronger together, and that our collective worship can move mountains and heal broken spirits.

In our choir, we learn that every voice matters. Whether you sing soprano, alto, tenor, or bass, your contribution is essential to the whole. Just as in life, we each have our part to play, and when we work together in harmony, we can achieve extraordinary things.

Let us remember that our unity in song is a reflection of the unity we should have in our hearts - united in love, purpose, and faith.',
                'scripture_reference' => 'Psalm 133:1 - "How good and pleasant it is when God\'s people live together in unity!"',
                'author' => 'Pastor Sarah Johnson',
                'category' => 'unity',
                'is_published' => true,
                'published_at' => now(),
            ],
            [
                'title' => 'Finding Your Voice in Worship',
                'slug' => 'finding-your-voice-in-worship',
                'content' => 'Many of us struggle with finding our voice, both literally and figuratively. In our choir, we learn that finding your voice is not about being the loudest or the most perfect, but about being authentic and true to who you are.

When we sing together, we discover that our voice has a unique place in the harmony. Some voices soar high like eagles, while others provide the steady foundation like the roots of a mighty tree. Both are equally important and beautiful.

In worship, finding your voice means connecting with God in a way that is genuine to you. It means expressing your faith, your joy, your struggles, and your victories through the gift of music that God has given you.

Remember, God gave you your voice for a reason. Use it to glorify Him, to encourage others, and to share His love with the world.',
                'scripture_reference' => 'Psalm 40:3 - "He put a new song in my mouth, a hymn of praise to our God."',
                'author' => 'Choir Director Michael Chen',
                'category' => 'worship',
                'is_published' => true,
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'The Joy of Making a Joyful Noise',
                'slug' => 'joy-of-making-joyful-noise',
                'content' => 'Sometimes we get caught up in perfectionism, thinking that our singing must be flawless to be acceptable to God. But the Bible tells us to "make a joyful noise unto the Lord" - not a perfect noise, but a joyful one.

In our choir, we celebrate the joy of singing, regardless of technical perfection. We laugh together when we make mistakes, we encourage each other when we\'re nervous, and we rejoice together when we create something beautiful.

The joy we feel when we sing comes from our hearts, not from our vocal cords. It comes from knowing that we are using our gifts to honor God and bless others. It comes from the fellowship we share as we make music together.

Let us never lose sight of the joy that comes from simply making a joyful noise unto the Lord. For in that joy, we find our true purpose and our greatest reward.',
                'scripture_reference' => 'Psalm 100:1 - "Make a joyful noise unto the Lord, all ye lands."',
                'author' => 'Music Minister David Williams',
                'category' => 'joy',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
        ];

        foreach ($devotions as $devotion) {
            Devotion::create($devotion);
        }
    }
}
