<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Equipos Jugadores</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/StyleListaJugadores.css')}}">
</head>

<body class="antialiased">
    <header>
        <!-- Grey with black text -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#"></a>
                </li>
            </ul>
        </nav>
    </header>
    @php
    $vadido = "¡Valido!";
    $noVadido = "¡No valido!";
    @endphp
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$vadido}}</strong>{{" "}}{{Session::get('mensaje')}}</h4>
    </div>
    @endif
    <div class="relative  items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0 ">
        <div class="bg-image w-100">
            <div class="mask d-flex align-items-center w-100">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            @if($equipo != null)
                            <h2 class="text-center"> <b>{{$equipo}} -- Jugadores</b></h2>
                            <h3>Categoria: {{$categoria}}</h3>
                            <div class="card fondoTabla ">
                                <div class="card-header ps-2 py-2 row">
                                    <div class="col-10">
                                        <h4 class="text-black card-title"><b>Integrantes</b> </h4>
                                    </div>
                                    <div class="col-2 d-grid">
                                        <a type="button" href="{{ url('equipo/delegado') }}" class="btn btn-primary"> Volver </a>
                                    </div>
                                </div>

                                <div class="card-body  pt-0 ps-3 text-center">
                                    @if(!$jugadores->isEmpty())
                                    @foreach ($jugadores as $jugador)
                                    <div class="card d-inline-block m-3" style="width: 19rem;">
                                        <div class="card-header">
                                            <h5 class="card-title">{{$jugador->PosicionJugador}} #{{$jugador->NumeroCamiseta}}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-center">
                                                <img class="card-img-top img-fluid" src="{{asset('storage').'/'.$jugador->Foto}}" alt="">
                                            </div>

                                            <h5>{{$jugador->NombrePersona}} </h5>
                                            <h6>{{$jugador->ApellidoPaterno}}</h6>
                                            <a href=""class="BotonE BotonRed red displayBoton " data-bs-toggle="modal" data-bs-target="#{{$jugador->ApellidoPaterno}}{{$jugador->IdJugador}}" > Eliminar</a>
                                            {{-- Modal --}}
                                                        <div class="modal fade" id="{{$jugador->ApellidoPaterno}}{{$jugador->IdJugador}}" tabindex="-1" aria-labelledby="{{$jugador->ApellidoPaterno}}{{$jugador->IdJugador}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="{{$jugador->ApellidoPaterno}}{{$jugador->IdJugador}}Label">Eliminar Jugador</h1>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img class="card-img-top" src="{{asset('storage').'/'.$jugador->Foto}}" alt="Foto del jugador">
                                                                        <p> <b>¿</b> Deseea eliminar los datos de {{$jugador->NombrePersona}} {{$jugador->ApellidoPaterno}} {{$jugador->ApellidoMaterno}} <br> 
                                                                        </p>
                                                                    </div>
                                                                    <form method="POST" action="/jugador/{{$jugador->IdJugador}}">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                      <div class="modal-footer">
                                                                        <a type="button" class="Boton" data-bs-dismiss="modal">Cancelar</a>
                                                                        <input type="submit" class="Boton red" value="Eliminar">  </input>
                                                                    </div>  
                                                                    </form>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

    </div>

                                    </div>
                                    @endforeach
                                    @else
                            
                                    <div class="d-flex justify-content-center">
                                
                                    <h3>No se encontraron datos</h3>
                                </div>
                                
                            @endif
                        </div>
                    </div>
                    @else
                                    <div class="d-flex justify-content-center">
                                        <h3>No se encontraron datos</h3>
                                    </div>
                 @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
