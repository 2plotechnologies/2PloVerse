<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    // Mostrar todos los cursos
    public function index()
    {
        $userId = Auth::id(); // Obtener el ID del usuario autenticado
        $histories = History::where('user_id', $userId)->get();
        return view('histories.index', compact('histories'));
    }

    // Mostrar el formulario para crear un nuevo curso
    public function create()
    {
        $categories = Categories::all();
        return view('histories.create', compact('categories'));
    }

    // Almacenar un nuevo curso en la base de datos
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
        $history = new History($data);

        if ($request->hasFile('image')) {
            $history->image = $request->file('image')->store('images', 'public');
        }

        $history->save();

        return redirect()->route('histories.index')->with('success', 'history created successfully.');
    }

    // Mostrar un curso específico
    public function show(History $history)
    {
        $chapters = $history->chapters; // Asumiendo que la relación está definida en el modelo History
        return view('histories.show', compact('history', 'chapters'));
    }


    // Mostrar el formulario para editar un curso existente
    public function edit(History $history)
    {
        $categories = Categories::all();
        return view('histories.edit', compact('history', 'categories'));
    }

    // Actualizar un curso existente en la base de datos
    public function update(Request $request, History $history)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $history->update($request->all());

        if ($request->hasFile('image')) {
            $history->image = $request->file('image')->store('images', 'public');
            $history->save();
        }

        return redirect()->route('histories.index')->with('success', 'Story updated successfully.');
    }

    // Eliminar un curso existente de la base de datos
    public function destroy(History $history)
    {
        $history->delete();

        return redirect()->route('histories.index')->with('success', 'Story deleted successfully.');
    }
}
