<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;

class MoodController extends Controller
{
    public function index()
    {
        $moods = Mood::where('user_id', auth()->id())->latest()->paginate(10);
        return view('moods.index', compact('moods'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mood' => 'required|string|max:100',
            'score' => 'nullable|integer|min:0|max:10',
            'note' => 'nullable|string',
        ]);
        $data['user_id'] = auth()->id();
        Mood::create($data);
        
        $quote = $this->getMotivationalQuote($data['mood']);
        return redirect()->route('moods.index')->with('success', 'Mood tercatat.')->with('quote', $quote);
    }
    
    private function getMotivationalQuote($mood)
    {
        $quotes = [
            'Senang' => [
                'Kebahagiaan adalah pilihan. Teruslah memilih untuk bahagia! 😊',
                'Hari ini adalah hari yang indah untuk bersyukur atas semua kebaikan.',
                'Senyummu adalah kekuatan yang dapat mengubah dunia.'
            ],
            'Sedih' => [
                'Tidak apa-apa merasa sedih. Ini adalah bagian dari menjadi manusia. 💙',
                'Setelah hujan, selalu ada pelangi. Badai ini akan berlalu.',
                'Kamu lebih kuat dari yang kamu kira. Percayalah pada dirimu sendiri.'
            ],
            'Cemas' => [
                'Tarik napas dalam-dalam. Kamu bisa melewati ini satu langkah demi satu langkah.',
                'Kecemasan adalah perasaan, bukan fakta. Kamu aman sekarang.',
                'Fokus pada apa yang bisa kamu kendalikan hari ini.'
            ],
            'Tenang' => [
                'Ketenangan adalah kekuatan super. Nikmati momen damai ini.',
                'Dalam ketenangan, kamu menemukan kebijaksanaan sejati.',
                'Kedamaian dimulai dari dalam diri. Kamu sudah di jalur yang tepat.'
            ],
            'Marah' => [
                'Kemarahan adalah emosi yang valid. Gunakan energi ini untuk perubahan positif.',
                'Ambil jeda sejenak. Bernapas dapat membantu menenangkan badai dalam hati.',
                'Kamu memiliki kekuatan untuk mengubah kemarahan menjadi kekuatan.'
            ],
            'Bersemangat' => [
                'Energi positifmu menular! Teruslah bersinar! ✨',
                'Semangat adalah bahan bakar untuk mencapai impian. Gas terus!',
                'Antusiasme adalah kunci untuk membuka pintu kesempatan.'
            ]
        ];
        
        $moodQuotes = $quotes[$mood] ?? [
            'Setiap perasaan adalah valid. Kamu sedang melakukan yang terbaik.',
            'Hari ini adalah kesempatan baru untuk tumbuh dan belajar.',
            'Ingatlah bahwa kamu dicintai dan dihargai.'
        ];
        
        return $moodQuotes[array_rand($moodQuotes)];
    }
}
