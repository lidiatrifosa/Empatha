@extends('layouts.app')
@section('title','Journals')
@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl">Your Journals</h1>
    <a href="{{ route('journals.create') }}" class="btn">New Entry</a>
</div>
@foreach($journals as $j)
    <div class="card mb-3">
        <h2 class="font-semibold">{{ $j->title }}</h2>
        <p class="text-sm">{{ \Illuminate\Support\Str::limit($j->content, 200) }}</p>
        <div class="mt-2 text-xs text-gray-600">{{ $j->created_at->diffForHumans() }}</div>
        <div class="mt-2"><a href="{{ route('journals.show', $j) }}" class="text-blue-600">Read</a></div>
    </div>
@endforeach
{{ $journals->links() }}
@endsection
