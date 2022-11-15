<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Credeenciales Equipo</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleCredenciales.css')}}">
    </head>
    <body class="antialiased">
    <header >
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
        <div class="relative  items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0 ">
                <div class="bg-image w-100" >
                    <div class="mask d-flex align-items-center w-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                @if($equipo != null)
                                <h2 class="text-center"> <b>{{$equipo->NombreEquipo}} -- Credenciales</b></h2>
                                <h3>Categoria: {{$equipo->NombreCategoria}}</h3>
                                <div class="d-flex justify-content-between pb-2">
                                    
                                            <a type="button" href="{{ url('credenciales/generar/'.$equipo->NombreEquipo.'/'.$equipo->NombreCategoria)}}" class="btn btn-primary btn-sm ">
                                        @if($credencialesJugadores->isEmpty() && $credencialesTecnicos->isEmpty())
                                            Generar Credenciales 
                                        @else
                                            Actualizar
                                        @endif
                                        </a>
                                    
                                    
                                    @if(!$credencialesJugadores->isEmpty() && !$credencialesTecnicos->isEmpty())
                                        <a type="button" href="{{ url('credenciales/pdf/'.$equipo->NombreEquipo.'/'.$equipo->NombreCategoria)}}" class="btn btn-primary btn-sm ">
                                        Descargar
                                        </a>
                                    @endif
                                </div>
                               
                                <div class="card fondoTabla">
                                    <div class="card-header ps-3 py-2">
                                        <h4 class="text-black card-title"><b>Lista de Credenciales</b> </h4>
                                    </div>
                                        <div class="card-body  pt-0 ps-3">
                                            <div class="accordion mt-2" id="accordionPanelsStayOpenExample">
                                                @if(!$credencialesJugadores->isEmpty())
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                                    <strong>Jugadores</strong> 
                                                    </button>
                                                    </h2>
                                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                                <div class="accordion-body">
                                                            <div class="row justify-content-center">
                                                            @foreach ($credencialesJugadores as $jugador)
                                                            <div class="col-4 p-0 mb-3">
                                                                <div class="card h-100 " >
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">Campeonato Maxi-Basquet</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                                <div class="d-flex justify-content-center">
                                                                                    <img class="card-img-top foto img-fluid" src="{{asset('storage').'/'.$jugador->Foto}}" alt="">
                                                                                </div>
                                                                                <div class="text-center"><h5><b>Jugador</b></h5></div>
                                                                                <div>
                                                                                    <p><b>Nombre: </b>{{$jugador->NombrePersona}} {{$jugador->ApellidoPaterno}}</p>
                                                                                </div>
                                                                                <div><p><b>Equipo: </b> {{$equipo->NombreEquipo}}</p> </div>
                                                                                <div><p><b>Categoria: </b> {{$equipo->NombreCategoria}}</p> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4 p-0 me-2 mb-3 " >
                                                                <div class="card  h-100 credencial ">
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">Campeonato Maxi-Basquet</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                                <div class="d-flex justify-content-center">
                                                                                    <img class="card-img-top qr img-fluid" src="{{asset('storage').'/'.$jugador->CodigoQR}}" alt="">
                                                                                </div>
                                                                                <div class="text-center"><h5><b>Escanee el código QR para mayor información</b></h5></div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            @endforeach   
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if(!$credencialesTecnicos->isEmpty())
                                                <div class="accordion-item mt-2">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                        <b>Técnicos</b> 
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                                        <div class="accordion-body">
                                                            
                                                            <div class="row justify-content-center">
                                                            @foreach ($credencialesTecnicos as $tecnico)
                                                            <div class="col-4 p-0 mb-3">
                                                                <div class="card h-100 " >
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">Campeonato Maxi-Basquet</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                                <div class="d-flex justify-content-center">
                                                                                    <img class="card-img-top foto img-fluid" src="{{asset('storage').'/'.$tecnico->Foto}}" alt="">
                                                                                </div>
                                                                                <div class="text-center"><h5><b>{{$tecnico->RolesTecnicos}}</b></h5></div>
                                                                                <div>
                                                                                    <p><b>Nombre: </b>{{$tecnico->NombrePersona}} {{$tecnico->ApellidoPaterno}}</p>
                                                                                </div>
                                                                                <div><p><b>Equipo: </b> {{$equipo->NombreEquipo}}</p> </div>
                                                                                <div><p><b>Categoria: </b> {{$equipo->NombreCategoria}}</p> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4 p-0 me-2 mb-3 " >
                                                                <div class="card  h-100 credencial ">
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">Campeonato Maxi-Basquet</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                                <div class="d-flex justify-content-center">
                                                                                    <img class="card-img-top qr img-fluid" src="{{asset('storage').'/'.$tecnico->CodigoQR}}" alt="">
                                                                                </div>
                                                                                <div class="text-center"><h5><b>Escanee el código QR para mayor información</b></h5></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @endforeach   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif   
                                            </div>      
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
</html>
