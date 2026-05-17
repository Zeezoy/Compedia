<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Competition;
use App\Models\CompetitionRule;
use App\Models\CompetitionStage;
use App\Models\CompetitionPrize;

class CompetitionSeeder extends Seeder
{
    public function run(): void
    {
        $competitions = [
            [
                'title' => 'Hology 8.0',
                'category_id' => 3,
                'organizer' => 'FILKOM UB',
                'description' => 'National level software development competition.',
                'deadline' => '2026-10-12',
                'registration_link' => 'https://hology.ub.ac.id',
                'guidebook_link' => 'https://guidebook.com',
                'photo_url' => 'https://bit.ly/4ujtACE',
                'registration_fee' => 50000,
                'rules' => [
                    'Participants must be undergraduate students.',
                    'Projects must be original.',
                    'Maximum 3 members per team.',
                ],
                'stages' => [
                    [
                        'title' => 'Registration',
                        'start_date' => '2026-08-01',
                        'end_date' => '2026-09-01',
                    ],
                    [
                        'title' => 'Preliminary Round',
                        'start_date' => '2026-09-05',
                        'end_date' => '2026-09-20',
                    ],
                ],
                'prizes' => [
                    [
                        'title' => '1st Place',
                        'amount' => 15000000,
                    ],
                    [
                        'title' => '2nd Place',
                        'amount' => 10000000,
                    ],
                ],
            ],

            [
                'title' => 'UX Challenge 2026',
                'category_id' => 2,
                'organizer' => 'BEM FILKOM',
                'description' => 'UI/UX design competition for students.',
                'deadline' => '2026-11-01',
                'registration_link' => 'https://uxchallenge.id',
                'guidebook_link' => 'https://guidebook-ux.id',
                'photo_url' => 'https://bit.ly/ui-ux-design-contest',
                'registration_fee' => 25000,
                'rules' => [
                    'One team consists of max 2 members.',
                    'Design must be submitted before deadline.',
                ],
                'stages' => [
                    [
                        'title' => 'Registration',
                        'start_date' => '2026-09-01',
                        'end_date' => '2026-10-01',
                    ],
                ],
                'prizes' => [
                    [
                        'title' => 'Winner',
                        'amount' => 8000000,
                    ],
                ],
            ],

            [
                'title' => 'TechnoSpark Hackathon 2026',
                'category_id' => 1,
                'organizer' => 'FILKOM UB',
                'description' => 'National scale hackathon focusing on smart city innovation and AI-powered solutions.',
                'deadline' => '2026-03-10',
                'registration_link' => 'https://technospark.id',
                'guidebook_link' => 'https://technospark.id/guidebook',
                'registration_fee' => 75000,
                'photo_url' => 'https://bit.ly/tech-event-poster',

                'rules' => [
                    'Participants must be active university students.',
                    'Maximum 3 members per team.',
                    'Projects must be developed during the hackathon period.',
                ],

                'stages' => [
                    [
                        'title' => 'Registration',
                        'start_date' => '2026-03-01',
                        'end_date' => '2026-03-10',
                    ],
                    [
                        'title' => 'Preliminary Submission',
                        'start_date' => '2026-03-15',
                        'end_date' => '2026-03-30',
                    ],
                    [
                        'title' => 'Final Presentation',
                        'start_date' => '2026-03-28',
                        'end_date' => '2026-03-30',
                    ],
                ],

                'prizes' => [
                    [
                        'title' => '1st Place',
                        'amount' => 20000000,
                    ],
                    [
                        'title' => '2nd Place',
                        'amount' => 12000000,
                    ],
                    [
                        'title' => '3rd Place',
                        'amount' => 7000000,
                    ],
                ],
            ],

        ];

        foreach ($competitions as $item) {
            $category = Category::where(
                'id',
                $item['category_id']
            )->first();

            $competition = Competition::create([
                'title' => $item['title'],
                'category_id' => $item['category_id'],
                'organizer' => $item['organizer'],
                'description' => $item['description'],
                'deadline' => $item['deadline'],
                'registration_link' => $item['registration_link'],
                'guidebook_link' => $item['guidebook_link'],
                'registration_fee' => $item['registration_fee'],
                'photo_url' => $item['photo_url'] ?? null,
                'is_public' => true,
            ]);

            foreach ($item['rules'] as $rule) {
                CompetitionRule::create([
                    'competition_id' => $competition->id,
                    'rule' => $rule,
                ]);
            }

            foreach ($item['stages'] as $stage) {
                CompetitionStage::create([
                    'competition_id' => $competition->id,
                    'title' => $stage['title'],
                    'start_date' => $stage['start_date'],
                    'end_date' => $stage['end_date'],
                ]);
            }

            foreach ($item['prizes'] as $prize) {
                CompetitionPrize::create([
                    'competition_id' => $competition->id,
                    'title' => $prize['title'],
                    'amount' => $prize['amount'],
                ]);
            }
        }
    }
}