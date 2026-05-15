<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Competitive Programming',
            'UI/UX Design',
            'Software Development',
            'Game Development',
            'Business Case',
            'Data Science',
            'IoT',
            'Hackathon',
        ];

        foreach ($categories as $category) {

            Category::create([
                'name' => $category
            ]);

        }
    }
}