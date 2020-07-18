@extends('layout')

@section('title','Blog-Post')

@section('content')
    <h5>This is section: {{ $section['tytul'] }} and responsible for that is:  {{ $name['author'] }}</h5>
@endsection