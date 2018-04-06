@extends('base')

@section('title', 'Programme sportif : {{ $aProgram->name }}')

@section('content')

{{-- dd($aProgram) --}}

<h1>{{ $aProgram->nameprog }}</h1>
<p>Créé par {{ $aProgram->user->name }}</p>
<p>{{ $aProgram->description }}</p>

@auth
@if($aProgram->id_user === Auth::user()->id )
<div class="bar-edit">    
    <a href="{{ URL::route('programs.edit', $aProgram->id) }}">Modifier</a>
    <form class="delete-form" action="{{ URL::route('programs.destroy', $aProgram->id) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" value="Supprimer" id="btnDelete" />
    </form>
</div>
@endif
@endauth

<h2>Contenu du programme</h2>

<ul id="listing">
    @foreach ($aProgram->exercises as $exo)
    <li>
        <figure class="vignette"><img src="/img/{{ $exo->img->path }}/{{ $exo->img->name }}.{{ $exo->img->ext }}" alt="{{ $exo->img->alt }}" /></figure>
        <section><h3><a href="{{ URL::route('exercises.show', $exo->id) }}">{{ $exo->name }}</a></h3>
            <p>{{ $exo->description }}</p>
        </section>
    </li>
    @endforeach
    </ul>


@endsection