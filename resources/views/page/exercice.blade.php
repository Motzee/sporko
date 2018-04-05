@extends('base')

@section('title', 'exercice {{ $exercice->name }}')

@section('content')

<h1 class="txt_center">Exercice {{ $exercice->name }}</h1>
<figure class="illustration"><img src="/img/{{ $exercice->getImg()->path }}/{{ $exercice->getImg()->name }}.{{ $exercice->getImg()->ext }}" alt="{{ $exercice->getImg()->alt }}" />
    <figcaption><p>{{ $exercice->description }}</p></figcaption>
</figure>

<p><a href="{{ URL::route('exercices') }}">-> Retour à la liste des exercices</a>
    
@endsection

