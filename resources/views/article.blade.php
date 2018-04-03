@extends('layouts.base')

@section('title', 'liste d\'articles')

@section('content')
    <p>This is my body content.</p>
    {{ $article }}
    </ul>
@endsection
        
@section('footer')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection
