@extends('layouts.app')
@section('title', 'Edit Jurnal')
@section('content')
<h1 class="text-2xl mb-4">Edit Jurnal</h1>
<form method="post" action="{{ route('journals.update', $journal) }}">
    @csrf @method('PUT')
    <div class="mb-2">
        <label class="block">Judul</label>
        <input name="title" value="{{ $journal->title }}" class="w-full p-2 border rounded" required />
    </div>
    <div class="mb-2">
        <label class="block">Isi</label>
        <textarea name="content" class="w-full p-2 h-40 border rounded" required>{{ $journal->content }}</textarea>
    </div>
    <button class="btn">Perbarui</button>
    <a href="{{ route('journals.show', $journal) }}" class="ml-2 text-gray-700">Batal</a>
</form>
@endsection