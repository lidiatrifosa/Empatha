<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;

class MoodController extends Controller
{
    public function index()
    {
        $moods = Mood::where('user_id', auth()->id())->latest()->paginate(10);
        return view('moods.index', compact('moods'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mood' => 'required|string|max:100',
            'score' => 'nullable|integer|min:0|max:10',
            'note' => 'nullable|string',
        ]);
        $data['user_id'] = auth()->id();
        Mood::create($data);
        return redirect()->route('moods.index')->with('success', 'Mood recorded.');
    }
}
