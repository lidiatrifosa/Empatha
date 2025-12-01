<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::where('user_id', auth()->id())->latest()->paginate(10);
        return view('journals.index', compact('journals'));
    }

    public function create()
    {
        return view('journals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $data['user_id'] = auth()->id();
        Journal::create($data);
        return redirect()->route('journals.index')->with('success', 'Journal saved.');
    }

    public function show(Journal $journal)
    {
        if ($journal->user_id !== auth()->id()) abort(403);
        return view('journals.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        if ($journal->user_id !== auth()->id()) abort(403);
        return view('journals.edit', compact('journal'));
    }

    public function update(Request $request, Journal $journal)
    {
        if ($journal->user_id !== auth()->id()) abort(403);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $journal->update($data);
        return redirect()->route('journals.index')->with('success', 'Journal updated.');
    }

    public function destroy(Journal $journal)
    {
        if ($journal->user_id !== auth()->id()) abort(403);
        $journal->delete();
        return redirect()->route('journals.index')->with('success', 'Journal deleted.');
    }
}
