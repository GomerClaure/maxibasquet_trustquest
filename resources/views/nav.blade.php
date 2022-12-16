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
    @guest
        <nav class="navbar navbar-expand-sm navbar-light menu">
            <!-- Brand -->
            <div class="container-fluid">
                <img class="logito" src="{{asset('storage').'/'.'img_Home'.'/'.'logo_maxi.png'}}" >
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="collapseNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item ms-3">
                            <a class="nav-link active" href="{{url('/home')}}">Home</a>
                        </li>
                        <li class="nav-item dropdown ms-3">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Equipos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('/Equipo')}}">Ver Equipos</a>
                            <a class="dropdown-item" href="{{url('/listaequipos')}}" >Lista Equipo</a>
                        </div>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="{{url('/jugadores')}}">Jugadores</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="{{url('/tecnicos')}}">Técnicos</a>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item ms-3">
                            <a class="nav-link active" href="{{url('/preinscripcion')}}">Preinscripcion</a>
                            </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link active " href="{{url('/historia')}}">Historia</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link active " href="{{url('/mostrarFixtur')}}">Fixture</a>
                        </li>
                    </ul>  
                    <ul class="navbar-nav ms-auto logout mb-2">
                        <li class="nav-item me-4">
                            <a class="nav-link active " href="{{url('/login')}}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endguest
    @auth
    @if (auth()->user()->IdRol ==3)
    <nav class="navbar navbar-expand-sm navbar-light menu">
        <!-- Brand -->
        <div class="container-fluid">
            <img class="logito" src="{{asset('storage').'/'.'img_Home'.'/'.'logo_maxi.png'}}" >
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="collapseNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item ms-3">
                        <a class="nav-link active" href="{{url('/home')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Equipos</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('/Equipo')}}">Ver Equipos</a>
                            <a class="dropdown-item" href="{{url('/equipo/lista/eliminar')}}" >Eliminar Equipo</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/jugadores')}}">Jugadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/tecnicos')}}">Técnicos</a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Preinscripcion</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('/preinscripcion')}}">Preinscribir</a>
                            <a class="dropdown-item" href="{{url('/aplicaciones')}}" >Ver Preinscripciones</a>
                            <a class="dropdown-item" href="{{url('/formulario')}}" >Validar Preinscripciones</a>
                        </div>
                    </li>

                    <li class="nav-item ms-3">
                        <a class="nav-link active " href="{{url('/registrarPartidos/create')}}">Crear Partido</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link active " href="{{url('/juez/create')}}">Registrar Personal</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link active " href="{{url('/historia')}}">Historia</a>
                    </li>
                    <li class="nav-item ms-3">
                            <a class="nav-link active " href="{{url('/mostrarFixtur')}}">Fixture</a>
                    </li>
                    
                </ul>  
                <ul class="navbar-nav ms-auto logout mb-2">
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/logout">Log Out</a>
                        </div>
                    </li>
                </ul>
            </div>
            </div>
      </nav>
    @elseif(auth()->user()->IdRol ==2 || auth()->user()->IdRol ==1 || auth()->user()->IdRol ==5)
        <nav class="navbar navbar-expand-sm navbar-light menu">
            <!-- Brand -->
            <div class="container-fluid">
                <img class="logito" src="{{asset('storage').'/'.'img_Home'.'/'.'logo_maxi.png'}}" >
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="collapseNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item ms-3">
                            <a class="nav-link active" href="{{url('/home')}}">Home</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link active" href="{{url('/Equipo')}}">Equipos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="{{url('/jugadores')}}">Jugadores</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="{{url('/tecnicos')}}">Técnicos</a>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item ms-3">
                            <a class="nav-link active" href="{{url('/preinscripcion')}}">Preinscripcion</a>
                            </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link active " href="{{url('/historia')}}">Historia</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link active " href="{{url('/mostrarFixtur')}}">Fixture</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link active " href="{{url('/planilla/jugador')}}">Registro en planilla</a>
                        </li>
                    </ul>  
                    <ul class="navbar-nav ms-auto logout mb-2">
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="/logout">Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!--Este es el nav del delegado hacerlo mas bonito-->
    @elseif(auth()->user()->IdRol ==4)
        <nav class="navbar navbar-expand-sm navbar-light menu">
            <!-- Brand -->
            <div class="container-fluid">
                <img class="logito" src="{{asset('storage').'/'.'img_Home'.'/'.'logo_maxi.png'}}" >
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="collapseNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item ms-3">
                            <a class="nav-link active" href="{{url('/home')}}">Home</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link active" href="{{url('/Equipo')}}">Equipos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="{{url('/jugadores')}}">Jugadores</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="{{url('/tecnicos')}}">Técnicos</a>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item ms-3">
                            <a class="nav-link active" href="{{url('/preinscripcion')}}">Preinscripcion</a>
                            </li> 
                        <li class="nav-item">
                            <a class="nav-link active" href="{{url('/subirLogo')}}">Mi Equipo</a>
                        </li>
                        <!--hacer esto de los delegados usando un controller para el navegador-->

                        <li class="nav-item">
                            <a class="nav-link active " href="{{url('/historia')}}">Historia</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="nav-link active " href="{{url('/mostrarFixtur')}}">Fixture</a>
                        </li>
                    </ul>  
                    <ul class="navbar-nav ms-auto logout mb-2">
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{url('/logout')}}">Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @else
        <h1>Usuario no autorizado</h1>
    @endif
      
    @endauth
        
        
   
    
    <main >
            {{-- @include('flash-message') --}}
            @yield('content')
    </main>
   <br><br>
  <!-- Footer -->
</body>
<footer class="text-center text-white" style="background-color: #444b52;">
    <!-- Grid container -->
    <div class="container p-2 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Campeonato Maxi Basquet</span>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-2" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">TrustQuest.com</a>
    </div>
    <!-- Copyright -->
  </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</html>