@extends('layout')

@section('content')
    <h2>Edit form</h2>
    <form method="POST" action="{{ route('posts.update',['post'=>$post->id]) }}">
        @method('PUT')
        @csrf
        <label>Title:</label>
        <input type="text" name="title" value="{{ old('title',$post->title) }}">
        @error('title')
            <p style="color:red;">{{ $message }}</p>
        @enderror
        <br><br>
        <label>Content:</label>
        <input type="text" name="content" value="{{ old('content', $post->content) }}">
        @error('content')
            <p style="color:red;">{{ $message }}</p>
        @enderror
        <br><br>
        <input type="submit" value="Update post">
    </form>
@endsection

