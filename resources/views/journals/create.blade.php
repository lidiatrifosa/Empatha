@extends('layouts.app')
@section('title','Jurnal Baru')
@section('content')
<h1 class="text-2xl mb-4">Jurnal Baru</h1>
<form method="post" action="{{ route('journals.store') }}">
    @csrf
    <div class="mb-2">
        <label class="block">Judul</label>
        <input name="title" class="w-full p-2" />
    </div>
    <div class="mb-2">
        <label class="block">Isi</label>
        <textarea name="content" class="w-full p-2 h-40"></textarea>
    </div>
    <button class="btn">Simpan</button>
    <a href="{{ route('journals.index') }}" class="ml-2 text-gray-700">Kembali</a>
</form>
@endsection
