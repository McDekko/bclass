<?php

namespace App\Http\Controllers;
use App\Models\Post;

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
}