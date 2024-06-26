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
    public function create(Request $request)
    {
        $blogId = $request->query('blog_id'); // Obtener el blog_id de la query string
        return view('blogposts.create', compact('blogId'));
    }

    // Almacenar un nuevo blog post en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'blog_id' => 'required|exists:blog,id',
        ]);

        BlogPost::create($request->all());

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }

    // Mostrar un blog post específico
    public function show(BlogPost $post)
    {
        return view('blogposts.show', compact('post'));
    }

    // Mostrar el formulario para editar un blog post existente
    public function edit(BlogPost $post)
    {
        return view('blogposts.edit', compact('post'));
    }

    // Actualizar un blog post existente en la base de datos
    public function update(Request $request, BlogPost $blogPost)
    {
        dd($blogPost);
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $blogPost->update($request->all());

        return redirect()->route('blogs.show', $blogPost->blog_id)->with('success', 'Blog post updated successfully.');
    }

    // Eliminar un blog post existente de la base de datos
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();

        return redirect()->route('blogs.show', $blogPost->blog_id)->with('success', 'Blog post updated successfully.');
    }
}
