<?php

namespace App\Http\Controllers;

use App\Models\SelfCareArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = SelfCareArticle::latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function show(SelfCareArticle $article)
    {
        return view('articles.show', compact('article'));
    }

    // Admin create/store
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);
        SelfCareArticle::create($data);
        return redirect()->route('articles.index')->with('success', 'Article published.');
    }

    public function destroy(SelfCareArticle $article)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted.');
    }
}
