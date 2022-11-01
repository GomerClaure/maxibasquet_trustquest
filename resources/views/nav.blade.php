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
        <li><a href="{{url('/Home')}}">Inicio</a></li>
        <li><a href="{{url('/Equipo')}}">Equipos</a></li> 
        <li><a href="{{url('/preinscripcion')}}">Contacto</a></li>
        <li><a href="{{url('/Aplicaciones')}}">Sesion</a></li>
        <li><a href="#">Historia</a></li>
    </ul>
    <main >
            {{-- @include('flash-message') --}}
            @yield('content')
    </main>
</body>
</html>