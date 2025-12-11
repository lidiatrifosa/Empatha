@extends('layouts.app')
@section('title', 'Diskusi Baru')
@section('content')
<h1 class="text-2xl mb-4">Mulai Diskusi Baru</h1>
<form method="post" action="{{ route('forum.store') }}">
    @csrf
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Judul</label>
        <input name="title" class="w-full p-2 border rounded" placeholder="Apa yang ingin Anda diskusikan?" required />
    </div>
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">Pesan</label>
        <textarea name="body" class="w-full p-2 h-32 border rounded" placeholder="Bagikan pemikiran Anda..." required></textarea>
    </div>
    <button class="btn">Posting Diskusi</button>
    <a href="{{ route('forum.index') }}" class="ml-2 text-gray-700">Batal</a>
</form>
@endsection