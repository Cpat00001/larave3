@extends('layout')

@section('content')
<h2>Create a Post</h2>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label>Title:</label>
    <input type="text" name="title">
    <br><br>
    <label>Content:</label>
    <input type="text" name="content">
    <br><br>
    <input type="submit" value="Create">

</form>
@endsection