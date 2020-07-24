@extends('layout')

@section('content')
<h2>Create a Post</h2>
<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
        <p style="color:red;">{{ $message }}</p>
    @enderror
    <br><br>
    <label>Content:</label>
    <input type="text" name="content" value="{{ old('content') }}">
    @error('content')
        <p style="color:red;">{{ $message }}</p>
    @enderror
    <br><br>
    <input type="submit" value="Create">

</form>
@endsection