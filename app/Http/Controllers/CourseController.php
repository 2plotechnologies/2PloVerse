<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    // Mostrar todos los cursos
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        $categories = Categories::all();
        return view('courses.create', compact('categories'));
    }

    // Almacenar un nuevo curso en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();  // Obtener el ID del usuario autenticado
        $data['title'] = $request['title'];
        $course = new Course($data);

        if ($request->hasFile('image')) {
            $course->image = $request->file('image')->store('images', 'public');
        }

        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    // Mostrar un curso específico
    public function show(Course $course)
    {
        $units = $course->units;
        return view('courses.show', compact('course', 'units'));
    }

    // Mostrar el formulario para editar un curso existente
    public function edit(Course $course)
    {
        $categories = Categories::all();
        return view('courses.edit', compact('course', 'categories'));
    }

    // Actualizar un curso existente en la base de datos
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $course->update($request->all());

        if ($request->hasFile('image')) {
            $course->image = $request->file('image')->store('images', 'public');
            $course->save();
        }

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    // Eliminar un curso existente de la base de datos
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
