@extends('base')

@section('title', 'daily training')


@section('content')
<h1>Entrainement quotidien</h1>
<h2>Débutant</h2>
    <ul>
    @foreach ($exercices["beginner"] as $exo)
        <li>{{ $exo["name"] }} : {{ $exo["description"] }}</li>
    @endforeach
    </ul>
<h2>Intermédiaire</h2>
<h2>Confirmé</h2>
    
@endsection
