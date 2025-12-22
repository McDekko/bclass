@extends('layouts.layout2')

@section('title', 'Blog Home')

@section('content')

    @if (session('success'))
        <p><strong>{{ session('success') }}</strong></p>
    @endif

    <h1>My Blog</h1>

    <a href="/post/create">Tambah post Baru</a>

    <hr>

    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <>{{ $post->content }}</p>
            <p>
                <small>Created: {{ $post->created_at->format('d M Y H:i') }}</small>
            </p>
            <p>
                <a href="/post/{{ $post->id }}">Read More</a>
                <a href="/post/{{ $post->id }}/edit">Edit</a>
                <form action="/post/{{ $post->id }}" method="POST" style="display: inline;"
                        onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </p>
            <hr>
        </div>
        <hr>
    @endforeach
@endsection

