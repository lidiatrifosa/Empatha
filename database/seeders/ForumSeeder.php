<?php

namespace Database\Seeders;

use App\Models\ForumPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        if (!$user) return;

        ForumPost::create([
            'user_id' => $user->id,
            'title' => 'Selamat datang di komunitas kesehatan mental kami!',
            'body' => "Halo semua! Ini adalah ruang aman untuk berbagi pengalaman, bertanya, dan saling mendukung dalam perjalanan kesehatan mental kita. Mohon bersikap baik dan menghormati semua anggota.",
        ]);
    }
}