<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Name - @yield('title')</title>
</head>
<body>
    @section('header')
        <h5 style="color:greenyellow">Use this CRUD app to create/delete Posts  </h5>
        <h5>Simple menu:</h5>
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('posts.index') }}">List of Posts</a></li>
            <li><a href="{{ route('posts.create') }}">Create a post</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('blog-post',['id'=>1,'num'=>1]) }}">Blog-Post 1 , Motoryzacja</a></li>
        </ul>
    <div>
        @if(session()->has('status'))
            <h3 style="color:red">{{ session()->get('status') }}</h3>
        @endif
        @yield('content')
    </div>
    @if($errors->any())
    <div style="background-color:red;color:white;height:auto">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>
</html>
