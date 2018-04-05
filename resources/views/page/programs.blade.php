@extends('base')

@section('title', 'Programmes sportifs')

@section('content')
<h1>Programmes sportifs</h1>
    
    <ul>
    @foreach ($programs as $aProgram)
    <li><a href="{{ URL::to('programs/'.$aProgram->id) }}">{{ $aProgram->name }}</a> : {{ $aProgram->description }}</li>
    @endforeach
    </ul>

@auth
    <a href="{{ URL::route('programs.create') }}" class="btn_action">Conçois ton propre programme sportif</a>
@endauth     

@endsection