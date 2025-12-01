<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\JournalController;
use App\Http\Controllers\MoodController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ArticleController;
use App\Http\Middleware\AdminMiddleware;

Route::middleware(['auth'])->group(function () {
    Route::resource('journals', JournalController::class);
    Route::get('moods', [MoodController::class, 'index'])->name('moods.index');
    Route::post('moods', [MoodController::class, 'store'])->name('moods.store');
    Route::get('forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('forum/{post}', [ForumController::class, 'show'])->name('forum.show');
    Route::delete('forum/{post}', [ForumController::class, 'destroy'])->name('forum.destroy');
});

Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::middleware([AdminMiddleware::class, 'auth'])->group(function () {
    Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');
});
