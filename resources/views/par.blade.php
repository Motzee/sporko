@extends('layouts.base')

@section('title', 'liste d\'articles')

@section('header')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
    <ul>
    @foreach ($articles as $article)
        <li>{{ $article['title'] }}</li>
    @endforeach
    </ul>
@endsection
        
@section('footer')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection