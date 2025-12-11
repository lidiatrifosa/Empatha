@extends('layouts.app')
@section('title', 'Artikel Self-Care')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl">Self-Care & Kesehatan Mental</h1>
    @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('articles.create') }}" class="btn">Artikel Baru</a>
    @endif
</div>

@foreach($articles as $article)
    <div class="card mb-4">
        <h2 class="text-xl font-semibold mb-2">
            <a href="{{ route('articles.show', $article) }}" class="text-blue-600 hover:underline">{{ $article->title }}</a>
        </h2>
        <p class="text-sm mb-2">{{ \Illuminate\Support\Str::limit($article->body, 200) }}</p>
        <div class="flex justify-between items-center text-xs text-gray-600">
            <span>
                @if($article->author) Oleh {{ $article->author }} • @endif
                {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('M j, Y') : $article->created_at->format('M j, Y') }}
            </span>
            <div class="flex space-x-2">
                @auth
                    <form method="post" action="{{ route('articles.bookmark', $article) }}" style="display:inline">
                        @csrf
                        <button class="text-blue-600 hover:underline">
                            {{ auth()->user()->bookmarks()->where('self_care_article_id', $article->id)->exists() ? 'Hapus Bookmark' : 'Bookmark' }}
                        </button>
                    </form>
                @endauth
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <form method="post" action="{{ route('articles.destroy', $article) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="text-red-600 hover:underline" onclick="return confirm('Hapus artikel ini?')">Hapus</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endforeach
{{ $articles->links() }}
@endsection