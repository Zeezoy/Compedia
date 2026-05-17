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