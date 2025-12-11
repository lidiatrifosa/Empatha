<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Empatha - Mental Health Support')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: #F7F9FB; font-family: 'Poppins', sans-serif; }
        .card { background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(85,119,170,0.1); }
        .transition-shadow { transition: box-shadow 0.3s ease; }
        .hover\:shadow-lg:hover { box-shadow: 0 10px 25px rgba(85,119,170,0.15); }
        .transition-colors { transition: background-color 0.2s ease; }
        .btn { background: #5577AA; color: white; padding: 0.75rem 1.5rem; border-radius: 8px; text-decoration: none; display: inline-block; border: none; cursor: pointer; }
        .btn:hover { background: #4466AA; }
        .nav-link { color: #5577AA; text-decoration: none; padding: 0.5rem 1rem; border-radius: 6px; }
        .nav-link:hover { background: #A7C7E7; }
        .prose { line-height: 1.7; }
        .prose h1, .prose h2, .prose h3 { margin-top: 1.5rem; margin-bottom: 0.5rem; font-weight: bold; }
        .prose p { margin-bottom: 1rem; }
        .prose ul, .prose ol { margin-bottom: 1rem; padding-left: 1.5rem; }
        .prose li { margin-bottom: 0.5rem; }
    </style>
</head>
<body class="min-h-screen">
    <nav class="bg-white shadow-sm border-b" style="border-color: #A7C7E7;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-bold" style="color: #5577AA;">Empatha</a>
                    @auth
                    <div class="ml-8 flex space-x-4">
                        <a href="{{ route('dashboard') }}" class="nav-link">Beranda</a>
                        <a href="{{ route('journals.index') }}" class="nav-link">Jurnal</a>
                        <a href="{{ route('moods.index') }}" class="nav-link">Mood Tracker</a>
                        <a href="{{ route('forum.index') }}" class="nav-link">Forum</a>
                        <a href="{{ route('articles.index') }}" class="nav-link">Self-Care</a>
                        <a href="{{ route('articles.bookmarks') }}" class="nav-link">Bookmark</a>
                    </div>
                    @endauth
                </div>
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                        <a href="{{ route('register') }}" class="btn">Daftar</a>
                    @else
                        <span class="text-sm text-gray-600">Halo, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="nav-link">Keluar</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('quote'))
            <div class="mb-4 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded text-center">
                <h3 class="font-semibold mb-2">💭 Kata Motivasi Untukmu:</h3>
                <p class="italic">"{{ session('quote') }}"</p>
            </div>
        @endif
        
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>