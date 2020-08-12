@extends('layout')
@section('content')
    <div style="background-color:rgb(163, 177, 143);padding:15px;margin-bottom:5px;
    width:200px,height:100px;">
        <h3 style="color:green">Post title:</h3>
        <h3>{{ $post->title }}</h3>
        <p style="font-weight:bold">Post content:</p>
        <p>{{ $post->content }}</p>
        
        @if((new Carbon\Carbon())->diffInMinutes($post->created_at) < 5)
            <p>This is completly new post</p>
        @else
            <p>Created at: {{ $post->created_at->diffForHumans() }}</p>
        @endif
        
        <h4>Comments:</h4>
        @forelse($post->comments as $comment)
            <p>{{ $comment->content }}</p>
            <p class="text-muted"> added:  {{ $comment->created_at->diffForHumans() }}</p>
        @empty
            <p>No comments yet</p>
        @endforelse

    </div>
   

@endsection