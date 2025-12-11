<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use App\Models\Comment;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $posts = ForumPost::withCount('comments')->latest()->paginate(15);
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
        $post->load(['comments.user']);
        return view('forum.show', ['post' => $post]);
    }

    public function storeComment(Request $request, ForumPost $post)
    {
        $data = $request->validate([
            'body' => 'required|string',
        ]);
        $data['user_id'] = auth()->id();
        $data['forum_post_id'] = $post->id;
        Comment::create($data);
        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function destroy(ForumPost $post)
    {
        if ($post->user_id !== auth()->id() && auth()->user()->role !== 'admin') abort(403);
        $post->delete();
        return redirect()->route('forum.index')->with('success', 'Post deleted.');
    }
}
