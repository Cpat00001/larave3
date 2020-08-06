<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Page Name - @yield('title')</title>
</head>
<body>
    @section('header')
    
    <div>
            <div class="container">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <h5>Simple menu:</h5>
                    <nav class="my-2 my-md-0 mr-md-3 bg-dark">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('posts.index') }}">List of Posts</a>
                        <a href="{{ route('posts.create') }}">Create a post</a>
                        <a href="{{ route('contact') }}">Contact</a>
                        <a href="{{ route('blog-post',['id'=>1,'num'=>1]) }}">Blog-Post 1 , Motoryzacja</a>

                        @guest
                            @if(Route::has('register'))
                            <p class="text-white">
                                <a href="{{ route('register') }}">Register</a>
                            </p>
                            @endif
                            <p class="text-white">
                                <a href="{{ route('login') }}">Login</a>
                            </p>
                        @else
                            <p class="text-white">
                                <a hreff={{ route('logout') }}
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout
                                ({{ Auth::user()->name }})    
                            </a>
                            </p>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form"
                                  style="display:none">
                                  @csrf >
                            </form>
                        @endguest
                    </nav>
                </div>

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
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
