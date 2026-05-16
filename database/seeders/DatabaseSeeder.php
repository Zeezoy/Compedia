<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'full_name' => 'Admin Compedia',
            'username' => 'admin',
            'email' => 'admin@compedia.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $this->call([
            CategorySeeder::class,
            CompetitionSeeder::class,
        ]);
    }
}