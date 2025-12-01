<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\ArticleSeeder;
use Database\Seeders\ForumSeeder;
use Database\Seeders\JournalSeeder;
use Database\Seeders\MoodSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // seed an admin user
        $this->call([AdminUserSeeder::class]);

        // sample content
        $this->call([
            ArticleSeeder::class,
            ForumSeeder::class,
            JournalSeeder::class,
            MoodSeeder::class,
        ]);
    }
}
