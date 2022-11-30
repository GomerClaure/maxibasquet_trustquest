<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cuerpo Técnico</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleListaCuerpoTecnico.css')}}">
    </head>
    <body class="">
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
                <div class="bg-image w-100" >
                    <div class="mask d-flex align-items-center w-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                @if($equipo != null)
                                <h1 class="text-center titulo"> <b>{{$equipo}} -- Cuerpo Técnico</b></h1>
                                <h3 class="titulo">Categoria: {{$categoria}}</h3>
                                <div class="card contenedorCard">
                                    <div class="card-header ps-3 py-2 row">
                                        <div class="col-10">
                                            <h4 class="text-black card-title"><b>Integrantes</b> </h4>
                                        </div>
                                        <div class="col-2 d-grid">
                                            <a type="button" href="{{url('subirLogo')}}" class="btn"> Volver </a>
                                        </div>
                                    </div>
                                    <div class="card-body  pt-0 ps-3">
                                            @if(!$tecnicos->isEmpty())
                                            @foreach ($tecnicos as $tecnico)
                                            
                                               <div class="card tarjeta d-inline-block m-3" style="width: 19rem;">
                                                    <div class="card-header cardHeader">
                                                        <h5 class="card-title">{{$tecnico->RolesTecnicos}}</h5>
                                                    </div>
                                                    <div class="card-body cardBody">
                                                        <div class="d-flex justify-content-center">
                                                        <img class="card-img-top img-fluid" src="{{asset('storage').'/'.$tecnico->Foto}}" alt="">
                                                        </div>

                                                        <h5>{{$tecnico->NombrePersona}} </h5>
                                                        <h6>{{$tecnico->ApellidoPaterno}} {{$tecnico->ApellidoMaterno}}</h6>
                                                        <a href=""class="Boton red displayBoton " data-bs-toggle="modal" data-bs-target="#{{$tecnico->ApellidoPaterno}}{{$tecnico->IdTecnicos}}" > Eliminar </a>
                                                        {{-- Modal --}}
                                                        <div class="modal fade" id="{{$tecnico->ApellidoPaterno}}{{$tecnico->IdTecnicos}}" tabindex="-1" aria-labelledby="{{$tecnico->ApellidoPaterno}}{{$tecnico->IdTecnicos}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="{{$tecnico->ApellidoPaterno}}{{$tecnico->IdTecnicos}}Label">Eliminar Técnico</h1>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img class="card-img-top" src="{{asset('storage').'/'.$tecnico->Foto}}" alt="Foto del jugador">
                                                                        <p> <b>¿</b> Deseea eliminar los datos de {{$tecnico->NombrePersona}} {{$tecnico->ApellidoPaterno}} {{$tecnico->ApellidoMaterno}} <br> 
                                                                        con <b>CI: {{$tecnico->CiPersona}}?</b>   </p>
                                                                    </div>
                                                                    <form method="POST" action="/tecnico/{{$tecnico->IdTecnicos}}">
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