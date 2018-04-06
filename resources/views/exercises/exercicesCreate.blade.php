@extends('base')

@section('title', 'Créer un exercice')

@section('content')
<h1>Créer un nouvel exercice</h1>
    
<form action="/exercises" method="POST">
    {{ csrf_field() }}
    
    <div class="champsform"><label for="name" required>Nom de l'exercice</label>
        <input id="name" name="name" type="text" required />
    </div>
    
       
    <div class="champsform"><label for="description">Description</label>
        <textarea id="description" name="description"></textarea>
    </div>

    <p>Une image</p>
    
    <input type="submit" value="Créer" id="btnValid" />
</form>

@endsection