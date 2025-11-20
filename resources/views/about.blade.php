@extends('layouts.layout2')

@section('title', 'About')

@section('content')
    <h1>saya dalah</h1>
    <p><strong>Nama:</strong> {{ $info['name'] }}</p>
    <p><strong>Bio:</strong> {{ $info['bio'] }}</p>
    
    <a href="/">← Back to Home</a>
@endsection