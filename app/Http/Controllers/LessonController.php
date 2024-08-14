<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Unit;

class LessonController extends Controller
{
    public function index()
    {
        // Este método no es necesario en este contexto
    }

    public function create(Request $request)
    {
        $unitId = $request->query('unit_id');
        return view('lessons.create', compact('unitId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'unit_id' => 'required|exists:units,id'
        ]);

        Lesson::create($request->all());

        return redirect()->route('units.show', $request->unit_id)->with('success', 'Lesson created successfully.');
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lessons.show', compact('lesson'));
    }

    public function showUser($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lessons.showUser', compact('lesson'));
    }


    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lessons.edit', compact('lesson'));
    }

    public function update(Request $request, $id)
    {

        $lesson = Lesson::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $lesson->update($request->all());

        return redirect()->route('units.show', $lesson->unit_id)->with('success', 'Lesson updated successfully.');
    }

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);

        $unitId = $lesson->course_id;
        $lesson->delete();

        return redirect()->route('units.show', $unitId)->with('success', 'Lesson deleted successfully.');
    }
}
