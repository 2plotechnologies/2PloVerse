<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\History;

class ChapterController extends Controller
{
    public function index()
    {
        // Este método no es necesario en este contexto
    }

    public function create(Request $request)
    {
        $historyId = $request->query('history_id');
        return view('chapters.create', compact('historyId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'history_id' => 'required|exists:histories,id'
        ]);

        Chapter::create($request->all());

        return redirect()->route('histories.show', $request->history_id)->with('success', 'Chapter created successfully.');
    }

    public function show(Chapter $chapter)
    {
        //var_dump($chapter);
        return view('chapters.show', compact('chapter'));
    }

    public function showUser(Chapter $chapter)
    {
        return view('chapters.showUser', compact('chapter'));
    }


    public function edit(Chapter $chapter)
    {
        return view('chapters.edit', compact('chapter'));
    }

    public function update(Request $request, Chapter $chapter)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $chapter->update($request->all());

        return redirect()->route('histories.show', $chapter->history_id)->with('success', 'Chapter updated successfully.');
    }

    public function destroy(Chapter $chapter)
    {
        $historyId = $chapter->history_id;
        $chapter->delete();

        return redirect()->route('histories.show', $historyId)->with('success', 'Chapter deleted successfully.');
    }
}
