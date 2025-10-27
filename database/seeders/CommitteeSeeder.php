<?php

namespace Database\Seeders;

use App\Models\Committee;
use Illuminate\Database\Seeder;

class CommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $committees = [
            // Presidency
            [
                'name' => 'Pastor John Mwangi',
                'position' => 'President',
                'department' => 'Presidency',
                'bio' => 'Leading our choir with vision and spiritual guidance for over 15 years.',
                'email' => 'president@godsfamilychoir.com',
                'phone' => '+250 783 123 456',
                'social_links' => [
                    'facebook' => 'https://facebook.com/pastorjohn',
                    'linkedin' => 'https://linkedin.com/in/pastorjohn'
                ],
                'order' => 1,
            ],
            [
                'name' => 'Sarah Kimani',
                'position' => 'Vice President',
                'department' => 'Presidency',
                'bio' => 'Supporting our mission with dedication and administrative excellence.',
                'email' => 'vicepresident@godsfamilychoir.com',
                'phone' => '+250 783 123 457',
                'order' => 2,
            ],

            // Coaching Staff
            [
                'name' => 'Dr. Michael Ochieng',
                'position' => 'Music Director',
                'department' => 'Coaching Staff',
                'bio' => 'Professional music director with 20+ years of experience in choral music.',
                'email' => 'musicdirector@godsfamilychoir.com',
                'phone' => '+250 783 123 458',
                'social_links' => [
                    'youtube' => 'https://youtube.com/michaelochieng',
                    'instagram' => 'https://instagram.com/michaelochieng'
                ],
                'order' => 1,
            ],
            [
                'name' => 'Grace Wanjiku',
                'position' => 'Vocal Coach',
                'department' => 'Coaching Staff',
                'bio' => 'Specialized in vocal training and harmony development.',
                'email' => 'vocalcoach@godsfamilychoir.com',
                'phone' => '+250 783 123 459',
                'order' => 2,
            ],

            // Spiritual Department
            [
                'name' => 'Elder David Kiprop',
                'position' => 'Spiritual Advisor',
                'department' => 'Spiritual Department',
                'bio' => 'Providing spiritual guidance and ensuring our music glorifies God.',
                'email' => 'spiritual@godsfamilychoir.com',
                'phone' => '+250 783 123 460',
                'order' => 1,
            ],
            [
                'name' => 'Reverend Mary Wanjala',
                'position' => 'Prayer Coordinator',
                'department' => 'Spiritual Department',
                'bio' => 'Leading our prayer ministry and spiritual development programs.',
                'email' => 'prayer@godsfamilychoir.com',
                'phone' => '+250 783 123 461',
                'order' => 2,
            ],

            // Social Media Team
            [
                'name' => 'Alex Mwangi',
                'position' => 'Social Media Manager',
                'department' => 'Social Media Team',
                'bio' => 'Managing our online presence and digital outreach.',
                'email' => 'socialmedia@godsfamilychoir.com',
                'phone' => '+250 783 123 462',
                'social_links' => [
                    'facebook' => 'https://facebook.com/godsfamilychoir',
                    'instagram' => 'https://instagram.com/godsfamilychoir',
                    'twitter' => 'https://twitter.com/godsfamilychoir',
                    'youtube' => 'https://youtube.com/godsfamilychoir'
                ],
                'order' => 1,
            ],
            [
                'name' => 'Joyce Akinyi',
                'position' => 'Content Creator',
                'department' => 'Social Media Team',
                'bio' => 'Creating engaging content and managing our digital platforms.',
                'email' => 'content@godsfamilychoir.com',
                'phone' => '+250 783 123 463',
                'order' => 2,
            ],

            // Fashion and Kits
            [
                'name' => 'Esther Wambui',
                'position' => 'Fashion Coordinator',
                'department' => 'Fashion and Kits',
                'bio' => 'Ensuring our choir looks professional and unified in appearance.',
                'email' => 'fashion@godsfamilychoir.com',
                'phone' => '+250 783 123 464',
                'order' => 1,
            ],

            // Fellowship
            [
                'name' => 'Peter Kamau',
                'position' => 'Fellowship Coordinator',
                'department' => 'Fellowship',
                'bio' => 'Building community and fostering strong relationships among members.',
                'email' => 'fellowship@godsfamilychoir.com',
                'phone' => '+250 783 123 465',
                'order' => 1,
            ],

            // Treasurer
            [
                'name' => 'James Mutua',
                'position' => 'Treasurer',
                'department' => 'Treasurer',
                'bio' => 'Managing our finances and ensuring transparent financial practices.',
                'email' => 'treasurer@godsfamilychoir.com',
                'phone' => '+250 783 123 466',
                'order' => 1,
            ],

            // GF Junior
            [
                'name' => 'Rebecca Nyong\'o',
                'position' => 'Junior Coordinator',
                'department' => 'GF Junior',
                'bio' => 'Leading our youth choir and nurturing young musical talent.',
                'email' => 'junior@godsfamilychoir.com',
                'phone' => '+250 783 123 467',
                'order' => 1,
            ],

            // GF Diaspora
            [
                'name' => 'Dr. Patricia Omondi',
                'position' => 'Diaspora Coordinator',
                'department' => 'GF Diaspora',
                'bio' => 'Connecting with our international members and global outreach.',
                'email' => 'diaspora@godsfamilychoir.com',
                'phone' => '+250 783 123 468',
                'social_links' => [
                    'linkedin' => 'https://linkedin.com/in/patriciaomondi',
                    'facebook' => 'https://facebook.com/patriciaomondi'
                ],
                'order' => 1,
            ],

            // Advisors
            [
                'name' => 'Bishop Samuel Mwangi',
                'position' => 'Senior Advisor',
                'department' => 'Advisors',
                'bio' => 'Providing strategic guidance and spiritual oversight.',
                'email' => 'advisor@godsfamilychoir.com',
                'phone' => '+250 783 123 469',
                'order' => 1,
            ],
            [
                'name' => 'Professor Elizabeth Kariuki',
                'position' => 'Music Advisor',
                'department' => 'Advisors',
                'bio' => 'Academic advisor with expertise in music education and choral development.',
                'email' => 'musicadvisor@godsfamilychoir.com',
                'phone' => '+250 783 123 470',
                'order' => 2,
            ],
        ];

        foreach ($committees as $committee) {
            Committee::create($committee);
        }
    }
}
