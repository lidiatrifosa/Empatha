<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background: linear-gradient(135deg, #F7F9FB 0%, #A7C7E7 100%); font-family: 'Poppins', sans-serif; }
        .card { background: white; padding: 2rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(85,119,170,0.1); }
        .btn { background: #5577AA; color: white; padding: 0.75rem 1.5rem; border-radius: 8px; border: none; cursor: pointer; width: 100%; }
        .btn:hover { background: #4466AA; }
        input, textarea, select { width: 100%; padding: 0.75rem; border: 2px solid #A7C7E7; border-radius: 8px; }
        input:focus, textarea:focus, select:focus { outline: none; border-color: #5577AA; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <h1 class="text-8xl font-bold" style="color: #5577AA;">Empatha</h1>
            <p class="text-lg text-gray-600 mt-4">Teman Kesehatan Mental Anda</p>
        </div>
        <div class="card">
            {{ $slot }}
        </div>
    </div>
</body>
</html>