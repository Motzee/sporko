@extends('base')

@section('title', 'Programme sportif : {{ $aProgram->name }}')

@section('content')
<h1>{{ $aProgram->name }}</h1>
<p>Créé par {{ $author->name }}</p>
<p>{{ $aProgram->description }}</p>

@if($aProgram->id_user === Auth::user()->id )
<div class="bar-edit">    
    <a href="{{ URL::route('programs.edit', $aProgram->id) }}">Modifier</a>
    <form class="delete-form" action="{{ URL::route('programs.destroy', $aProgram->id) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" value="Supprimer" id="btnDelete" />
    </form>
@endif


@endsection