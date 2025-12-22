@extends('layouts.layout2')

@section('title', 'Blog Home')

@section('content')

    @if (session('success'))
        <p><strong>{{ session('success') }}</strong></p>
    @endif

    <h1>My Blog</h1>

    <a href="/post/create">Tambah post Baru</a>

    <hr>

    <form action="/" method="GET">
        <input type="text" value="{{ request('search') }}" name="search" placeholder="cari title...">
        <button type="submit">Cari</button>
        @if($search ?? false)
            <a href="/">clear</a>
        @endif
    </form>
    

    @if($search ?? false)
        @if($posts->total() > 0)
            <P>{{$posts->total()}} hasil pencarian untuk '{{ $search }}'</P>
        @else
            <P>Tidak ada hasil pencarian untuk '{{ $search }}'</P>
        @endif
    @endif

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

