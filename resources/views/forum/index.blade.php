@extends('layouts.app')
@section('title', 'Forum Komunitas')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl">Forum Komunitas</h1>
    <a href="{{ route('forum.create') }}" class="btn">Diskusi Baru</a>
</div>

@foreach($posts as $post)
    <div class="card mb-3">
        <h3 class="font-semibold">
            <a href="{{ route('forum.show', $post) }}" class="text-blue-600 hover:underline">{{ $post->title }}</a>
        </h3>
        <p class="text-sm mt-1">{{ \Illuminate\Support\Str::limit($post->body, 150) }}</p>
        <div class="flex justify-between items-center mt-2 text-xs text-gray-600">
            <span>Oleh {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }} • {{ $post->comments->count() }} komentar</span>
            @if($post->user_id === auth()->id() || auth()->user()->role === 'admin')
                <form method="post" action="{{ route('forum.destroy', $post) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600 hover:underline" onclick="return confirm('Hapus postingan ini?')">Hapus</button>
                </form>
            @endif
        </div>
    </div>
@endforeach
{{ $posts->links() }}
@endsection