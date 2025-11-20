@extends('layouts.layout2')

@section('title', $post['title'])

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    
    <hr>
    
    <a href="/">← kembali</a>
@endsection