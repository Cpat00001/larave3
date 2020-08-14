@extends('layout')

@section('content')
<h2>List of Posts:</h2>
@if(count($posts) > 0)
@foreach( $posts as $post)
<div style="background-color:rgb(165, 185, 194);padding:15px;margin-bottom:5px;
width:1000px;height:auto;border: 1px solid black;">
    <h5><a href="{{ route('posts.show',['post'=>$post->id])}}">{{ $post->title }}</a></h5>
    <p class="text-muted">
        Added: {{ $post->created_at->diffForHumans()}}
        by: {{ $post->user->name }}
    </p>
    <p>Post content: {{ $post->content }}</p>

     {{-- display comments count --}}
     @if($post->comments_count)
        <p>{{ $post->comments_count }} comments</p>
     @else
        <p>No comments yet.</p>
     @endif

    @can('update',$post)
    <a href="{{ route('posts.edit',['post'=>$post->id]) }}"><button class="btn btn-primary">Edit</button></a>
    @endcan
    @can('delete',$post)
    <form method="POST" class="fm-inline" action="{{ route('posts.destroy', ['post'=> $post->id]) }}" >
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @endcan

</div>
@endforeach
@else
    <h5>No blogPosts - create one!</h5>
@endif
@endsection
