<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogPost;

class BlogPostController extends Controller
{
    // Listar todos los blog posts
    public function index()
    {
        $blogPosts = BlogPost::all();
        return view('blogposts.index', compact('blogPosts'));
    }

    // Mostrar el formulario para crear un nuevo blog post
    public function create()
    {
        $blogs = Blog::all();
        return view('blogposts.create', compact('blogs'));
    }

    // Almacenar un nuevo blog post en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        BlogPost::create($request->all());

        return redirect()->route('blogposts.index')->with('success', 'Blog post created successfully.');
    }

    // Mostrar un blog post específico
    public function show(BlogPost $blogPost)
    {
        return view('blogposts.show', compact('blogPost'));
    }

    // Mostrar el formulario para editar un blog post existente
    public function edit(BlogPost $blogPost)
    {
        $blogs = Blog::all();
        return view('blogposts.edit', compact('blogPost', 'blogs'));
    }

    // Actualizar un blog post existente en la base de datos
    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        $blogPost->update($request->all());

        return redirect()->route('blogposts.index')->with('success', 'Blog post updated successfully.');
    }

    // Eliminar un blog post existente de la base de datos
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect()->route('blogposts.index')->with('success', 'Blog post deleted successfully.');
    }
}
