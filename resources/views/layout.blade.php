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
        <h2>Use this CRUD app to create/delete Posts  </h2>
    <div>
        @yield('content')
    </div>
</body>
</html>
