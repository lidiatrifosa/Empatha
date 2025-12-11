<?php

namespace Database\Seeders;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Database\Seeder;

class JournalSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();
        if (!$user) return;

        Journal::create([
            'user_id' => $user->id,
            'title' => 'Entri Jurnal Pertama Saya',
            'content' => "Hari ini saya mulai menggunakan aplikasi jurnal ini. Saya berharap ini akan membantu saya melacak pikiran dan perasaan dengan lebih baik. Menulis selalu menjadi terapi bagi saya.",
        ]);
    }
}