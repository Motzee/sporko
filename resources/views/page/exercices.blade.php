@extends('base')

@section('title', 'Liste des exercices')

@section('content')
<h1>Liste des exercices</h1>

    <ul>
    @foreach ($exercices as $exo)
    <li><a href="{{ URL::to('exercices/'.$exo->id) }}">{{ $exo->name }}</a> : {{ $exo->description }}</li>
    @endforeach
    </ul>

@endsection