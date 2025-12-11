@extends('layouts.app')
@section('title', 'Jurnal Saya')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl">Jurnal Saya</h1>
    <a href="{{ route('journals.create') }}" class="btn">Jurnal Baru</a>
</div>

@foreach($journals as $journal)
    <div class="card mb-3">
        <h3 class="font-semibold">
            <a href="{{ route('journals.show', $journal) }}" style="color: #5577AA;" class="hover:underline">{{ $journal->title }}</a>
        </h3>
        <p class="text-sm mt-1">{{ \Illuminate\Support\Str::limit($journal->content, 150) }}</p>
        <div class="flex justify-between items-center mt-2 text-xs text-gray-600">
            <span>{{ $journal->created_at->diffForHumans() }}</span>
            <div class="space-x-2">
                <a href="{{ route('journals.edit', $journal) }}" class="text-blue-600 hover:underline">Edit</a>
                <form method="post" action="{{ route('journals.destroy', $journal) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600 hover:underline" onclick="return confirm('Hapus jurnal ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
{{ $journals->links() }}
@endsection