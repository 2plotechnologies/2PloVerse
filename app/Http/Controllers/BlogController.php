<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // Listar todos los blogs
    public function index()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $blogs = Blog::where('user_id', $userId)->get();
        return view('blogs.index', compact('blogs'));
    }

    // Mostrar el formulario para crear un nuevo blog
    public function create()
    {
        $categories = Categories::all();
        return view('blogs.create', compact('categories'));
    }

    // Almacenar un nuevo blog en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();  // Obtener el ID del usuario autenticado

        $blog = new Blog($data);

        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('images', 'public');
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    // Mostrar un blog específico
    public function show(Blog $blog)
    {
        $posts = $blog->posts; // Relación está definida en el modelo Blog
        return view('blogs.show', compact('blog', 'posts'));
    }

    // Mostrar el formulario para editar un blog existente
    public function edit(Blog $blog)
    {
        dd($blog);
        $categories = Categories::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    // Actualizar un blog existente en la base de datos
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $blog->fill($request->all());

        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('images', 'public');
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    // Eliminar un blog existente de la base de datos
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
