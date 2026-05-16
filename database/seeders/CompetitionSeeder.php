<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competition;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        $competitions = [

            [
                'title' => 'Global Code Olympiad',
                'description' => 'International competitive programming contest.',
                'category_id' => 1,
                'organizer' => 'International Code Society',
                'deadline' => now()->addDays(12),
                'prize' => 'Rp100.000',
                'status' => 'aktif',
                'added_by' => 1,
            ],

            [
                'title' => 'Neuro-AI Research Grant',
                'description' => 'AI research competition for students.',
                'category_id' => 6,
                'organizer' => 'Neural Edge Labs',
                'deadline' => now()->addDays(24),
                'prize' => 'Rp500.000',
                'status' => 'aktif',
                'added_by' => 1,
            ],

            [
                'title' => 'Digital Fusion Award',
                'description' => 'UI/UX design competition.',
                'category_id' => 2,
                'organizer' => 'Modern Art Guild',
                'deadline' => now()->addDays(3),
                'prize' => 'Rp1.000.000',
                'status' => 'aktif',
                'added_by' => 1,
            ],

        ];

        foreach ($competitions as $competition) {

            Competition::create($competition);

        }
    }
}