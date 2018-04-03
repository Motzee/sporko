@extends('base')

@section('title', 'exercice {{ $exercice->name }}')

@section('content')
<h1>Exercice {{ $exercice->name }}</h1>
<p>{{ $exercice->description }}</p>
<p><a href="{{ URL::route('exercices') }}">-> Retour à la liste des exercices</a>
    
@endsection

