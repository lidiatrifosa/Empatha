@extends('layouts.app')
@section('title', 'Pelacak Suasana Hati')
@section('content')
<h1 class="text-2xl mb-4">Pelacak Suasana Hati</h1>

<div class="card mb-6">
    <h2 class="font-semibold mb-3">Catat Suasana Hati Anda</h2>
    <form method="post" action="{{ route('moods.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm">Suasana Hati</label>
                <select name="mood" class="w-full p-2 border rounded" required>
                    <option value="">Pilih suasana hati...</option>
                    <option value="Senang">😊 Senang</option>
                    <option value="Sedih">😢 Sedih</option>
                    <option value="Cemas">😰 Cemas</option>
                    <option value="Tenang">😌 Tenang</option>
                    <option value="Marah">😠 Marah</option>
                    <option value="Bersemangat">🤩 Bersemangat</option>
                </select>
            </div>
            <div>
                <label class="block text-sm">Skor (1-10)</label>
                <input type="number" name="score" min="1" max="10" class="w-full p-2 border rounded" />
            </div>
            <div>
                <button class="btn mt-5">Catat</button>
            </div>
        </div>
        <div class="mt-3">
            <label class="block text-sm">Catatan (opsional)</label>
            <textarea name="note" class="w-full p-2 border rounded" rows="2" placeholder="Bagaimana perasaan Anda hari ini?"></textarea>
        </div>
    </form>
</div>

<h2 class="text-xl mb-3">Riwayat Suasana Hati Anda</h2>
@foreach($moods as $mood)
    <div class="card mb-3">
        <div class="flex justify-between items-start">
            <div>
                <span class="font-semibold">{{ $mood->mood }}</span>
                @if($mood->score) <span class="text-sm">({{ $mood->score }}/10)</span> @endif
                @if($mood->note) <p class="text-sm mt-1">{{ $mood->note }}</p> @endif
            </div>
            <span class="text-xs text-gray-600">{{ $mood->created_at->diffForHumans() }}</span>
        </div>
    </div>
@endforeach
{{ $moods->links() }}
@endsection