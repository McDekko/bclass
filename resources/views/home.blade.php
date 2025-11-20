@extends('layouts.layout2')

@section('title', 'Blog Home')

@section('content')
    <h1>My Blog</h1>
    
    @foreach($posts as $post)
        <div class="post">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <a href="/post/{{ $post->id }}">Read More →</a>
        </div>
    @endforeach
    <p>Total Posts: {{ $totalposts }}</p>
@endsection