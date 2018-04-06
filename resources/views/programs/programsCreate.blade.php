@extends('base')

@section('title', 'Créer un programme')

@section('content')
<h1>Conçois ton programme sportif</h1>
    
<form action="/programs" method="POST">
    {{ csrf_field() }}
    
    <div class="champsform"><label for="name" required>Nom du programme</label>
        <input id="name" name="name" type="text" required />
    </div>
    
       
    <div class="champsform"><label for="description">Description</label>
        <textarea id="description" name="description"></textarea>
    </div>
    
    <input type="submit" value="Créer" id="btnValid" />
</form>

@endsection