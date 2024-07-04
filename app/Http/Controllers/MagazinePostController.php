<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MagazinePost;
use App\Models\Magazine;

class MagazinePostController extends Controller
{
    public function index()
    {
        // Este método no es necesario en este contexto
    }

    public function create(Request $request)
    {
        $magazineId = $request->query('magazine_id');
        return view('magazineposts.create', compact('magazineId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'magazine_id' => 'required|exists:magazines,id'
        ]);

        MagazinePost::create($request->all());

        return redirect()->route('magazines.show', $request->magazine_id)->with('success', 'Magazine post created successfully.');
    }

    public function show($id)
    {
        $magazinePost = MagazinePost::findOrFail($id);
        return view('magazineposts.show', compact('magazinePost'));
    }

    public function edit($id)
    {
        $magazinePost = MagazinePost::findOrFail($id);
        return view('magazineposts.edit', compact('magazinePost'));
    }

    public function update(Request $request, $id)
    {

        $magazinePost = MagazinePost::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $magazinePost->update($request->all());

        return redirect()->route('magazines.show', $magazinePost->magazine_id)->with('success', 'Magazine post updated successfully.');
    }

    public function destroy($id)
    {
        $magazinePost = MagazinePost::findOrFail($id);

        $magazineId = $magazinePost->magazine_id;
        $magazinePost->delete();

        return redirect()->route('magazines.show', $magazineId)->with('success', 'Magazine post deleted successfully.');
    }
}
