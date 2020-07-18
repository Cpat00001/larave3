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
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('blog-post',['id'=>1,'num'=>1]) }}">Blog-Post 1 , Motoryzacja</a></li>
        </ul>
    <div>
        @yield('content')
    </div>
</body>
</html>
