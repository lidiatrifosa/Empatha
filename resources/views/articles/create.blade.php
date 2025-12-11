@extends('layouts.app')
@section('title', 'Buat Artikel')
@section('content')
<h1 class="text-2xl mb-4">Buat Artikel Baru</h1>
<form method="post" action="{{ route('articles.store') }}">
    @csrf
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Judul</label>
        <input name="title" class="w-full p-2 border rounded" required />
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Penulis</label>
        <input name="author" class="w-full p-2 border rounded" />
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Isi Artikel</label>
        <textarea name="body" class="w-full p-2 h-64 border rounded" required></textarea>
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Tanggal Publikasi</label>
        <input type="datetime-local" name="published_at" class="w-full p-2 border rounded" />
    </div>
    <button class="btn">Publikasikan Artikel</button>
    <a href="{{ route('articles.index') }}" class="ml-2 text-gray-700">Batal</a>
</form>
@endsection