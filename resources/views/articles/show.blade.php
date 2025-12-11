@extends('layouts.app')
@section('title', $article->title)
@section('content')
<div class="card">
    <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
    @if($article->author)
        <p class="text-sm text-gray-600 mb-4">By {{ $article->author }}</p>
    @endif
    <div class="prose max-w-none whitespace-pre-line leading-relaxed">{{ $article->body }}</div>
    <div class="mt-6 pt-4 border-t flex justify-between items-center">
        <span class="text-xs text-gray-600">
            Dipublikasikan {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('j M Y') : $article->created_at->format('j M Y') }}
        </span>
        @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('articles.edit', $article) }}" class="btn text-sm">Edit Artikel</a>
        @endif
    </div>
</div>
<a href="{{ route('articles.index') }}" class="mt-4 inline-block text-blue-600">← Kembali ke Artikel</a>
@endsection