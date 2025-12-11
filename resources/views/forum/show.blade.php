@extends('layouts.app')
@section('title', $post->title)
@section('content')
<div class="card">
    <h1 class="text-2xl font-semibold mb-3">{{ $post->title }}</h1>
    <div class="whitespace-pre-wrap mb-4">{{ $post->body }}</div>
    <div class="flex justify-between items-center text-sm text-gray-600">
        <span>Oleh {{ $post->user->name }} • {{ $post->created_at->format('j M Y H:i') }}</span>
        @if($post->user_id === auth()->id() || auth()->user()->role === 'admin')
            <form method="post" action="{{ route('forum.destroy', $post) }}" style="display:inline">
                @csrf @method('DELETE')
                <button class="text-red-600 hover:underline" onclick="return confirm('Hapus postingan ini?')">Hapus</button>
            </form>
        @endif
    </div>
</div>

<div class="mt-6">
    <h2 class="text-xl font-semibold mb-4">Komentar ({{ $post->comments->count() }})</h2>
    
    <div class="card mb-4">
        <h3 class="font-semibold mb-3">Tambah Komentar</h3>
        <form method="post" action="{{ route('forum.comment', $post) }}">
            @csrf
            <textarea name="body" class="w-full p-3 border rounded" rows="3" placeholder="Tulis komentar Anda..." required></textarea>
            <button class="btn mt-2">Kirim Komentar</button>
        </form>
    </div>
    
    @foreach($post->comments as $comment)
        <div class="card mb-3">
            <div class="whitespace-pre-wrap mb-2">{{ $comment->body }}</div>
            <div class="text-xs text-gray-600">
                Oleh {{ $comment->user->name }} • {{ $comment->created_at->diffForHumans() }}
            </div>
        </div>
    @endforeach
</div>

<a href="{{ route('forum.index') }}" class="mt-4 inline-block text-blue-600">← Kembali ke Forum</a>
@endsection