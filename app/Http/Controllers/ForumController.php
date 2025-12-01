<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $posts = ForumPost::latest()->paginate(15);
        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $data['user_id'] = auth()->id();
        ForumPost::create($data);
        return redirect()->route('forum.index')->with('success', 'Post created.');
    }

    public function show(ForumPost $post)
    {
        return view('forum.show', ['post' => $post]);
    }

    public function destroy(ForumPost $post)
    {
        if ($post->user_id !== auth()->id() && auth()->user()->role !== 'admin') abort(403);
        $post->delete();
        return redirect()->route('forum.index')->with('success', 'Post deleted.');
    }
}
