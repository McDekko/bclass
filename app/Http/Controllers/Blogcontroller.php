<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // halaman home isinya posts banyak
    public function home(Request $request)
    {
        $search = $request->input('search');
        $query = Post::query();

        if ($search) {
            $query->where(function ($antri) use ($search) {
                $antri->where('title', 'like', '%' . $search . '%')
                      ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        $posts = $query->latest()->paginate(5);
        $posts->appends(['search' => $search]);
        $totalposts = Post::count();

        return view('home', compact('posts', 'totalposts', 'search'));
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

    // delete
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/')->with('success', 'Post berhasil dihapus!');
    }
}