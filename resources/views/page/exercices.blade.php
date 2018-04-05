@extends('base')

@section('title', 'Liste des exercices')

@section('content')
<h1>Liste des exercices</h1>

    <ul id="listing">
    @foreach ($exercices as $exo)
    <li>
        <figure class="vignette"><img src="/img/{{ $exo->getImg()->path }}/{{ $exo->getImg()->name }}.{{ $exo->getImg()->ext }}" alt="{{ $exo->getImg()->alt }}" /></figure>
        <section><h2><a href="{{ URL::to('exercices/'.$exo->id) }}">{{ $exo->name }}</a></h2>
            <p>{{ $exo->description }}</p>
        </section>
    </li>
    @endforeach
    </ul>

@endsection