<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleListaTecnicos.css')}}">
    </head>
    @extends('nav') 
    @section('content')
    <body class="antialiased bodyJ">
        <div class="relative  items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0 ">
                <div class="bg-image w-100" >
                    <div class="mask d-flex align-items-center w-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                    
                                @if($equipo != null)
                                <h2 class="text-center"> <b>{{$equipo}} -- Jugadores</b></h2>
                                <h3>Categoria: {{$categoria}}</h3>
                                <div class="card fondoTabla">
                                    <div class="card-header ps-3 py-2 d-flex justify-content-between">
                                        <h4 class="text-black card-title"><b>Integrantes</b> </h4>
                                        <a type="button" href="{{ url('Equipo') }}" class="btn btn-primary btn-sm Jboton btnj"> Volver </a>
                                        
                                        
                                        
                                        
                                    </div>
                                        <div class="card-body  pt-0 ps-3">
                                            @if(!$jugadores->isEmpty())
                                            @foreach ($jugadores as $jugador)
                                                <div class="card d-inline-block m-3" style="width: 19rem;">
                                                <div class="card-header">
                                                    <h5 class="card-title">{{$jugador->PosicionJugador}} #{{$jugador->NumeroCamiseta}}</h5>
                                                </div>
                                                    <div class="card-body text-center">
                                                        <div class="d-flex justify-content-center">
                                                        <img class="card-img-top img-fluid" src="{{asset('storage').'/'.$jugador->Foto}}" alt="">
                                                        </div>
                                                    
                                                        <h5>{{$jugador->NombrePersona}} </h5>
                                                        <h6>{{$jugador->ApellidoPaterno}}</h6>
                                                        <a href="{{url('jugador'.'/'.$jugador->IdJugador)}}" class="btn btn-primary displayBotonJ btnj">Detalles</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @else
                                            <div class="d-flex justify-content-center">
                                                 <h3>No se encontro personal tecnico registrado</h3>
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
            </div>
        </div>
    </body>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</html>