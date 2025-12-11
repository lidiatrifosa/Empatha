@extends('layouts.app')
@section('title', 'Edit Artikel')
@section('content')
<h1 class="text-2xl mb-4">Edit Artikel</h1>
<form method="post" action="{{ route('articles.update', $article) }}">
    @csrf @method('PUT')
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Judul</label>
        <input name="title" value="{{ $article->title }}" class="w-full p-2 border rounded" required />
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Penulis</label>
        <input name="author" value="{{ $article->author }}" class="w-full p-2 border rounded" />
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Isi Artikel</label>
        <textarea name="body" class="w-full p-2 h-96 border rounded" required>{{ $article->body }}</textarea>
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Tanggal Publikasi</label>
        <input type="datetime-local" name="published_at" value="{{ $article->published_at ? $article->published_at->format('Y-m-d\TH:i') : '' }}" class="w-full p-2 border rounded" />
    </div>
    <button class="btn">Perbarui Artikel</button>
    <a href="{{ route('articles.show', $article) }}" class="ml-2 text-gray-700">Batal</a>
</form>
@endsection