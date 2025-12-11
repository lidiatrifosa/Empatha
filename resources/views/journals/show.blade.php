@extends('layouts.app')
@section('title', $journal->title)
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl">{{ $journal->title }}</h1>
    <div class="space-x-2">
        <a href="{{ route('journals.edit', $journal) }}" class="btn">Edit</a>
        <form method="post" action="{{ route('journals.destroy', $journal) }}" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn bg-red-400" onclick="return confirm('Hapus jurnal ini?')">Hapus</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="whitespace-pre-wrap">{{ $journal->content }}</div>
    <div class="mt-4 text-xs text-gray-600">Dibuat {{ $journal->created_at->format('j M Y H:i') }}</div>
</div>
<a href="{{ route('journals.index') }}" class="mt-4 inline-block text-blue-600">← Kembali ke Jurnal</a>
@endsection