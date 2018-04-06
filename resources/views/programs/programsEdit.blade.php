@extends('base')

@section('title', 'Editer un programme')

@section('content')
<h1>Modifie ton programme sportif</h1>
    
<form action="{{ URL::route('programs.update', $program->id) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    
    <div class="champsform"><label for="name" required>Nom du programme</label>
        <input id="name" name="name" type="text" value="{{ $program->name }}" required />
    </div>
    
       
    <div class="champsform"><label for="description">Description</label>
        <textarea id="description" name="description">{{ $program->description }}</textarea>
    </div>
    
    <input type="submit" value="Modifier" id="btnValid" />
</form>

@endsection