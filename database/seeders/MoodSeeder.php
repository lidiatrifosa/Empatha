<?php

namespace Database\Seeders;

use App\Models\Mood;
use App\Models\User;
use Illuminate\Database\Seeder;

class MoodSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        if (!$user) return;

        Mood::create([
            'user_id' => $user->id,
            'mood' => 'Senang',
            'score' => 7,
            'note' => 'Hari ini menyenangkan, merasa optimis tentang masa depan.',
        ]);
    }
}