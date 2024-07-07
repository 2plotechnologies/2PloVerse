<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Course;

class UnitController extends Controller
{
    public function index()
    {
        // Este método no es necesario en este contexto
    }

    public function create(Request $request)
    {
        $courseid = $request->query('course_id');
        return view('units.create', compact('courseid'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'course_id' => 'required|exists:courses,id'
        ]);

        Unit::create($request->all());

        return redirect()->route('courses.show', $request->course_id)->with('success', 'Unit created successfully.');
    }

    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        $lessons = $unit->lessons;
        return view('units.show', compact('unit', 'lessons'));
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        return view('units.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
        ]);

        $unit->update($request->all());

        return redirect()->route('courses.show', $unit->course_id)->with('success', 'Unit updated successfully.');
    }

    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);

        $courseId = $unit->course_id;

        $unit->delete();

        return redirect()->route('courses.show', $courseId)->with('success', 'Unit deleted successfully.');
    }
}
