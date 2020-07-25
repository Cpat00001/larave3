@extends('layout')

@section('content')
<h2>Create a Post</h2>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    @include('posts._form')
    <br><br>
    <input type="submit" value="Create">

</form>
@endsection