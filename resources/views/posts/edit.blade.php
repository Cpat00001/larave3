@extends('layout')

@section('content')
    <h2>Edit form</h2>
    <form method="POST" action="{{ route('posts.update',['post'=>$post->id]) }}">
        @method('PUT')
        @csrf
        @include('posts._form')
        <br><br>
        <input type="submit" value="Update post" class="btn btn-primary btn-block">
    </form>
@endsection

