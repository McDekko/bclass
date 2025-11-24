<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // seperti komponen tp bukan komponen halaman posts yg plural

    // halaman home isinya posts banyak
    public function home()
    {
        $posts = Post::all();
        $totalposts = Post::count();
        return view('home', compact('posts', 'totalposts'));
    }

    // single kalo diklik satu2
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post', compact('post'));
    }

    //halaman tentang
    public function about()
    {
        $info = Post::first();

        return view('about', compact('info'));
    }

    public function create()
    {
        return view('create');
    }

    // store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        return redirect('/')->with('success', 'Post berhasil ditambahkan!');
    }

    // edit dan update
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        return redirect('/')->with('success', 'Post berhasil diperbarui!');
    }
}