@extends('layouts.app')
@section('title','New Journal')
@section('content')
<h1 class="text-2xl mb-4">New Journal</h1>
<form method="post" action="{{ route('journals.store') }}">
    @csrf
    <div class="mb-2">
        <label class="block">Title</label>
        <input name="title" class="w-full p-2" />
    </div>
    <div class="mb-2">
        <label class="block">Content</label>
        <textarea name="content" class="w-full p-2 h-40"></textarea>
    </div>
    <button class="btn">Save</button>
    <a href="{{ route('journals.index') }}" class="ml-2 text-gray-700">Back</a>
</form>
@endsection
