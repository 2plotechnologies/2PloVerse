<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magazine;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class MagazineController extends Controller
{
    // Mostrar todas las revistas
    public function index()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $magazines = Magazine::where('user_id', $userId)->get(); // Filtrar por user_id
        return view('magazines.index', compact('magazines'));
    }

    // Mostrar el formulario para crear una nueva Revista
    public function create()
    {
        $categories = Categories::all();
        return view('magazines.create', compact('categories'));
    }

    // Almacenar una nueva Revista en la base de datos
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
        $magazine = new Magazine($data);

        if ($request->hasFile('image')) {
            $magazine->image = $request->file('image')->store('images', 'public');
        }

        $magazine->save();

        return redirect()->route('magazines.index')->with('success', 'Magazine created successfully.');
    }

    // Mostrar un Revista específico
    public function show(Magazine $magazine)
    {
        $magazinePosts  = $magazine->posts; // Carga los magazinePosts asociados
        return view('magazines.show', compact('magazine', 'magazinePosts'));
    }

    public function showUser(Magazine $magazine)
    {
        $magazinePosts  = $magazine->posts;
        return view('magazines.showUser', compact('magazine', 'magazinePosts'));
    }

    // Mostrar el formulario para editar un Revista existente
    public function edit(Magazine $magazine)
    {
        $categories = Categories::all();
        return view('magazines.edit', compact('magazine', 'categories'));
    }

    // Actualizar un Revista existente en la base de datos
    public function update(Request $request, Magazine $magazine)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $magazine->update($request->all());

        if ($request->hasFile('image')) {
            $magazine->image = $request->file('image')->store('images', 'public');
            $magazine->save();
        }

        return redirect()->route('magazines.index')->with('success', 'Magazine updated successfully.');
    }

    // Eliminar un Revista existente de la base de datos
    public function destroy(Magazine $magazine)
    {
        $magazine->delete();

        return redirect()->route('magazines.index')->with('success', 'Magazine deleted successfully.');
    }
}
