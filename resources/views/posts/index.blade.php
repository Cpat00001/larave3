@extends('layout')

@section('content')
<h2>List of Posts:</h2>
@foreach( $posts as $post)
<div style="background-color:rgb(67, 155, 196);padding:15px;margin-bottom:5px;
width:300px;height:100px;border: 1px solid black;">
    <h5><a href="{{ route('posts.show',['post'=>$post->id])}}">{{ $post->title }}</a></h5>
    <p>Post content: {{ $post->content }}</p>
    <a href="{{ route('posts.edit',['post'=>$post->id]) }}"><button>Edit</button></a>
</div>
@endforeach
@endsection
