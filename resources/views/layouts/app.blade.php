<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Empatha')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        :root{
            --bg:#fff7f3;
            --muted:#fbeedd;
            --accent:#ffd7c2;
            --primary:#ffb7a7;
            --text:#4b4440;
        }
        body{background:var(--bg);color:var(--text)}
        .card{background:var(--muted);border-radius:.5rem;padding:1rem}
        .btn{background:var(--primary);padding:.5rem 1rem;border-radius:.375rem;color:#3b2f2a}
    </style>
</head>
<body class="min-h-screen font-sans">
    <nav class="p-4 flex justify-between items-center">
        <a href="/" class="font-bold text-lg">Empatha</a>
        <div class="space-x-4">
            <a href="/dashboard" class="text-sm">Dashboard</a>
            <a href="/journals" class="text-sm">Journal</a>
            <a href="/moods" class="text-sm">Mood</a>
            <a href="/forum" class="text-sm">Forum</a>
            <a href="/articles" class="text-sm">Articles</a>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="/articles/create" class="text-sm">Create Article</a>
                @endif
                <form method="post" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="text-sm">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm">Login</a>
                <a href="{{ route('register') }}" class="text-sm">Register</a>
            @endauth
        </div>
    </nav>
    <main class="container mx-auto p-4">
        @if(session('success'))
            <div class="card mb-4">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
