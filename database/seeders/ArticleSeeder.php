<?php

namespace Database\Seeders;

use App\Models\SelfCareArticle;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'title' => '5 Teknik Pernapasan Sederhana untuk Mengatasi Kecemasan',
                'body' => "Latihan pernapasan adalah salah satu cara paling efektif untuk mengelola kecemasan. Berikut 5 teknik yang bisa Anda coba:\n\n1. Pernapasan 4-7-8: Tarik napas 4 hitungan, tahan 7 hitungan, buang napas 8 hitungan\n2. Pernapasan Kotak: Tarik napas 4 hitungan, tahan 4 hitungan, buang napas 4 hitungan, tahan 4 hitungan\n3. Pernapasan Perut: Fokus pada mengembangkan diafragma\n4. Pernapasan Berhitung: Hitung napas dari 1 sampai 10\n5. Pernapasan Bergantian: Gunakan jari untuk bergantian bernapas melalui lubang hidung\n\nLakukan latihan ini setiap hari untuk hasil terbaik.",
                'author' => 'Dr. Sarah Johnson',
                'published_at' => now(),
            ],
            [
                'title' => 'Membangun Rutinitas Self-Care Harian',
                'body' => "Self-care bukanlah hal yang egois - ini penting. Berikut cara membangun rutinitas yang berkelanjutan:\n\nPagi (10 menit):\n- Pernapasan sadar\n- Afirmasi positif\n- Peregangan ringan\n\nSiang (5 menit):\n- Keluar ruangan\n- Minum air dengan sadar\n- Scan tubuh cepat\n\nMalam (15 menit):\n- Tulis 3 hal yang disyukuri\n- Aktivitas santai\n- Persiapan untuk besok\n\nMulai dari hal kecil dan konsisten. Kesehatan mental Anda akan berterima kasih.",
                'author' => 'Tim Kesehatan Mental',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Self-Care untuk Kesehatan Mental: Merawat Pikiran di Tengah Hidup yang Sibuk',
                'body' => "Kesehatan mental sering kali kita abaikan karena merasa masih kuat atau nanti juga hilang sendiri. Padahal, pikiran yang terlalu lama dipaksa kuat bisa lelah sama seperti tubuh. Self-care untuk kesehatan mental adalah cara sederhana untuk memberi ruang bernapas bagi diri sendiri agar tetap stabil dan tenang.\n\nKenapa Self-Care Mental itu Penting?\n\nSetiap hari kita berhadapan dengan tekanan—tugas, ekspektasi, overthinking, dan rasa cemas. Jika dibiarkan, ini bisa membuat kita mudah marah, sulit fokus, bahkan burnout. Self-care membantu:\n\n- Menenangkan pikiran yang penuh\n- Mengurangi kecemasan dan stres\n- Meningkatkan suasana hati\n- Membantu kita lebih sadar akan emosi sendiri\n\nBentuk Self-Care untuk Kesehatan Mental:\n\n1. Menyadari Emosi Tanpa Menyalahkan Diri\nCoba tanyakan ke diri sendiri: Aku lagi ngerasain apa? Sederhana, tapi membantu kita memahami apa yang sebenarnya terjadi.\n\n2. Beristirahat dari Tekanan\nJauhkan diri dari tugas atau sosial media sebentar. Pikiran juga butuh waktu untuk tenang.\n\n3. Membuat Ruang Aman untuk Diri Sendiri\nBisa berupa kamar yang rapi, musik yang menenangkan, atau 10 menit tanpa gangguan.\n\n4. Menulis Perasaan\nJournaling membantu mengeluarkan hal yang menumpuk di kepala. Kadang perasaan jadi lebih ringan setelah dituliskan.\n\n5. Mencari Dukungan\nCurhat ke teman yang bisa dipercaya atau keluarga bukan tanda lemah—itu tanda kita peduli dengan kondisi mental kita.\n\n6. Menetapkan Batas\nBelajar bilang nggak ketika kita sudah terlalu penuh adalah salah satu bentuk self-care terbesar.\n\n7. Melatih Pernafasan atau Mindfulness\nBeberapa menit fokus pada napas bisa menurunkan ketegangan dan membuat pikiran lebih jernih.",
                'author' => 'Psikolog Empatha',
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($articles as $article) {
            SelfCareArticle::create($article);
        }
    }
}