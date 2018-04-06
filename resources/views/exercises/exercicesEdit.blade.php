@extends('base')

@section('title', 'Editer un exercice')

@section('content')
<h1>Modifier un exercice</h1>
    
    <p>Attention ! Cette modification affectera tous les programmes contenant cet exercice !</p>

<form action="{{ URL::route('exercises.update', $exercise->id) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    
    <div class="champsform"><label for="name" required>Nom de l'exercice</label>
        <input id="name" name="name" type="text" value="{{ $exercise->name}}" required />
    </div>
    
       
    <div class="champsform"><label for="description">Description</label>
        <textarea id="description" name="description">{{ $exercise->description }}</textarea>
    </div>
    
    <p>Image à changer ?</p>
    
    <input type="submit" value="Modifier" id="btnValid" />
</form>

@endsection