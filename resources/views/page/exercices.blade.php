@extends('base')

@section('title', 'Liste des exercices')

@section('content')
<h1>Liste des exercices</h1>
{{ dd($exercices) }}
    <ul id="listing">
    @foreach ($exercices as $exo)
    <li>
        <figure class="vignette"><img src="/img/{{ $exo->path }}/{{ $exo->nameimg }}.{{ $exo->ext }}" alt="{{ $exo->alt }}" /></figure>
        <section><h2><a href="{{ URL::to('exercices/'.$exo->idexo) }}">{{ $exo->nameexo }}</a></h2>
            <p>{{ $exo->description }}</p>
        </section>
    </li>
    @endforeach
    </ul>

@endsection