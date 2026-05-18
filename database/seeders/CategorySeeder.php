<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $category = [
            'Competitive Programming',
            'UI/UX Design',
            'Software Development',
            'Game Development',
            'Business Case',
            'Data Science',
            'IoT',
            'Hackathon',
        ];

        foreach ($category as $cat) {

            Category::create([
                'name' => $cat
            ]);

        }
    }
}