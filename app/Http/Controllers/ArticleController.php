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
        if (auth()->user()->role !== 'admin') abort(403);
        return view('articles.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);
        SelfCareArticle::create($data);
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dipublikasikan.');
    }

    public function edit(SelfCareArticle $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, SelfCareArticle $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);
        $article->update($data);
        return redirect()->route('articles.show', $article)->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(SelfCareArticle $article)
    {
        if (auth()->user()->role !== 'admin') abort(403);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted.');
    }

    public function bookmark(SelfCareArticle $article)
    {
        $user = auth()->user();
        $bookmark = $user->bookmarks()->where('self_care_article_id', $article->id)->first();
        
        if ($bookmark) {
            $bookmark->delete();
            return back()->with('success', 'Bookmark dihapus.');
        } else {
            $user->bookmarks()->create(['self_care_article_id' => $article->id]);
            return back()->with('success', 'Artikel disimpan ke bookmark.');
        }
    }

    public function bookmarks()
    {
        $bookmarks = auth()->user()->bookmarks()->with('article')->latest()->paginate(10);
        return view('articles.bookmarks', compact('bookmarks'));
    }
}
