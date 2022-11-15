<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Equipos Cuerpo Técnico</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleListaTecnicos.css')}}">
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
                                <h2 class="text-center"> <b>{{$equipo}} --Cuerpo Técnico</b></h2>
                                <h3>Categoria: {{$categoria}}</h3>
                                <div class="card fondoTabla">
                                    <div class="card-header ps-3 py-2 d-flex justify-content-between">
                                        <h4 class="text-black card-title"><b>Integrantes</b> </h4> 
                                    <a type="button" href="{{ url('Equipo') }}" class="btn btn-primary btn-sm boton "> Volver </a>
                                    
                                    </div>
                                        <div class="card-body  pt-0 ps-3">
                                            @if(!$tecnicos->isEmpty())
                                            @foreach ($tecnicos as $tecnico)
                                                <div class="card d-inline-block m-3" style="width: 19rem;">
                                                <div class="card-header">
                                                    <h5 class="card-title">{{$tecnico->RolesTecnicos}}</h5>
                                                </div>
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-center">
                                                        <img class="card-img-top img-fluid" src="{{asset('storage').'/'.$tecnico->Foto}}" alt="">
                                                        </div>
                                                    
                                                        <h5>{{$tecnico->NombrePersona}} </h5>
                                                        <h6>{{$tecnico->ApellidoPaterno}} {{$tecnico->ApellidoMaterno}}</h6>
                                                        <a href="{{url('tecnico'.'/'.$tecnico->IdTecnicos)}}" class="btn btn-primary">Detalles</a>
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
</html>