@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
<div class="card mb-12">
    <h2 class="text-2xl font-bold mb-4">Selamat datang kembali, {{ auth()->user()->name }}!</h2>
    <p class="text-gray-700">Bagaimana perasaan Anda hari ini? Perjalanan kesehatan mental Anda penting, dan kami di sini untuk mendukung setiap langkah Anda.</p>
</div>

<div class="flex gap-4 mb-8 overflow-x-auto">
    <div class="card text-center hover:shadow-lg transition-shadow flex-1 min-w-0">
        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <div class="w-6 h-6 bg-blue-500 rounded"></div>
        </div>
        <h3 class="text-lg font-semibold mb-2">Jurnal</h3>
        <p class="text-sm text-gray-600 mb-4">{{ auth()->user()->journals()->count() }} entri</p>
        <a href="{{ route('journals.index') }}" class="btn text-sm">Lihat Jurnal</a>
    </div>
    <div class="card text-center hover:shadow-lg transition-shadow flex-1 min-w-0">
        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <div class="w-6 h-6 bg-green-500 rounded-full"></div>
        </div>
        <h3 class="text-lg font-semibold mb-2">Suasana Hati</h3>
        <p class="text-sm text-gray-600 mb-4">{{ auth()->user()->moods()->count() }} tercatat</p>
        <a href="{{ route('moods.index') }}" class="btn text-sm">Catat Mood</a>
    </div>
    <div class="card text-center hover:shadow-lg transition-shadow flex-1 min-w-0">
        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <div class="w-6 h-6 bg-purple-500 rounded-lg"></div>
        </div>
        <h3 class="text-lg font-semibold mb-2">Forum</h3>
        <p class="text-sm text-gray-600 mb-4">{{ auth()->user()->forumPosts()->count() }} postingan</p>
        <a href="{{ route('forum.index') }}" class="btn text-sm">Gabung Diskusi</a>
    </div>
    <div class="card text-center hover:shadow-lg transition-shadow flex-1 min-w-0">
        <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <div class="w-6 h-6 bg-orange-500 rounded-full"></div>
        </div>
        <h3 class="text-lg font-semibold mb-2">Self-Care</h3>
        <p class="text-sm text-gray-600 mb-4">Belajar & berkembang</p>
        <a href="{{ route('articles.index') }}" class="btn text-sm">Baca Artikel</a>
    </div>
</div>
@endsection