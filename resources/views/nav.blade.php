<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>MaxiBasquet</title>
    <link rel="stylesheet" href="{{asset('css/StyleNav.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @guest
    <nav class="navbar navbar-expand-lg static-top menu">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="#"> --}}
                <img class="logito" src="{{asset('storage').'/'.'img_Home'.'/'.'logo_maxi.png'}}" >
            {{-- </a> --}}
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="collapseNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/Equipo')}}">Equipos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/preinscripcion')}}">Preinscripcion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/historia')}}">Historia</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <li><a href="{{url('/login')}}">Login</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endguest
    @auth
    <nav class="navbar navbar-expand-lg static-top menu">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="#"> --}}
                <img class="logito" src="{{asset('storage').'/'.'img_Home'.'/'.'logo_maxi.png'}}" >
            {{-- </a> --}}
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="collapseNavbar">
                <ul class="navbar-nav rutas">
                    <li class="nav-item">
                        <a href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/Equipo')}}">Equipos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/preinscripcion')}}">Preinscripcion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/historia')}}">Historia</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto logout">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                        </ul>
                      </li>
                </ul>
            </div>
        </div>
    </nav>  
    @endauth
        
        
   
    
    <main >
            {{-- @include('flash-message') --}}
            @yield('content')
    </main>
</body>
</html>