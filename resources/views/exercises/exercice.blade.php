@extends('base')

@section('title', 'exercice {{ $exercice->name }}')

@section('content')

<h1 class="txt_center">Exercice {{ $exercice->name }}</h1>
<figure class="illustration"><img src="/img/{{ $exercice->img->path }}/{{ $exercice->img->name }}.{{ $exercice->img->ext }}" alt="{{ $exercice->img->alt }}" />
    <figcaption><p>{{ $exercice->description }}</p></figcaption>
</figure>
@auth
{{--@if($aProgram->id_user === Auth::user()->id )--}}
<div class="bar-edit">    
    <a href="{{ URL::route('exercises.edit', $exercice->id) }}">Modifier</a>
</div>
{{--@endif--}}
@endauth
<p><a href="{{ URL::route('exercises.index') }}">-> Retour à la liste des exercices</a>
    
@endsection

