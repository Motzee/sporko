@extends('layouts.base')

@section('title', 'liste d\'articles')


@section('content')
<h1>Titre 1</h1>
<h2>Titre 2</h2>
<h3>Titre 3</h3>
    <p>This is my body content.</p>
    <ul>
    @foreach ($articles as $article)
        <li>{{ $article }}</li>
    @endforeach
    </ul>
@endsection