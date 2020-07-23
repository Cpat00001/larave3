@extends('layout')

@section('content')
<h2>List of Posts:</h2>
@foreach( $posts as $post)
    <h5><a href="{{ route('posts.show',['post'=>$post->id])}}">{{ $post->title }}</a></h5>
    <p>Post content: {{ $post->content }}</p>
@endforeach
@endsection
