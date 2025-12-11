@extends('layouts.app')
@section('title', 'Artikel Tersimpan')
@section('content')
<h1 class="text-2xl mb-4">Artikel Tersimpan</h1>

@if($bookmarks->count() > 0)
    @foreach($bookmarks as $bookmark)
        <div class="card mb-4">
            <h2 class="text-xl font-semibold mb-2">
                <a href="{{ route('articles.show', $bookmark->article) }}" style="color: #5577AA;" class="hover:underline">{{ $bookmark->article->title }}</a>
            </h2>
            <p class="text-sm mb-2">{{ \Illuminate\Support\Str::limit($bookmark->article->body, 200) }}</p>
            <div class="flex justify-between items-center text-xs text-gray-600">
                <span>
                    @if($bookmark->article->author) Oleh {{ $bookmark->article->author }} • @endif
                    Disimpan {{ $bookmark->created_at->diffForHumans() }}
                </span>
                <form method="post" action="{{ route('articles.bookmark', $bookmark->article) }}" style="display:inline">
                    @csrf
                    <button class="text-red-600 hover:underline">Hapus dari Bookmark</button>
                </form>
            </div>
        </div>
    @endforeach
    {{ $bookmarks->links() }}
@else
    <div class="card text-center">
        <p class="text-gray-600">Belum ada artikel yang disimpan.</p>
        <a href="{{ route('articles.index') }}" class="btn mt-4">Jelajahi Artikel</a>
    </div>
@endif
@endsection