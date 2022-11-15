<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>MaxiBasquet</title>
    <link rel="stylesheet" href="{{asset('css/StyleNav.css')}}">
</head>
<body>
    <ul class="menu">
    <img class="logito" src="{{asset('storage').'/'.'img_Home'.'/'.'logo_maxi.png'}}" >
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/Equipo')}}">Equipos</a></li> 
        <li><a href="{{url('/preinscripcion')}}">Preinscripcion</a></li>
        <li><a href="{{url('/historia')}}">Historia</a></li>
        <li><a href="{{url('/login')}}">Login</a></li>
    </ul>
    <main >
            {{-- @include('flash-message') --}}
            @yield('content')
    </main>
</body>
</html>