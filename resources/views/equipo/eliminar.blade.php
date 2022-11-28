<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Equipos Inscritos</title>

       
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleEliminarEquipos.css')}}">
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
        @if (Session::has('PartidoRegistrado'))
            <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('PartidoRegistrado')}}</h4>
            </div>
        @endif
        <div class="relative  items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0 ">
                <div class="bg-image w-100" >
                    <div class="mask d-flex align-items-center w-100">
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-12">
                                <h3>Equipos Inscritos</h3>
                                <h5>3er Torneo Internacional de Maxi Basquet</h5>
                            <div class="card">
                                <div class="ps-3 py-2">
                                    <h4>Lista Detallada</h4>
                                </div>
                            <div class="card-body  pt-0 ps-3 ">
                                <div class="table-responsive table-scroll rounded-0"  style="position: relative; ">
                                <table class="table table-striped table-borderless border-dark  mb-0 text-center align-middle">
                                    <thead>
                                    <tr>
                                        <th>logo del Equipo</th>
                                        <th>Nombre del Equipo </th>
                                        <th>País</th>
                                        <th>Categoria</th>
                                        <th>Eliminar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($equipos as $equipo)
                                        <tr>
                                            <td> <img src="{{asset('storage').'/'.$equipo->LogoEquipo}}" alt="" width="100" height="100"></td>
                                            <td class="contenido">{{$equipo->NombreEquipo}}</td>
                                            <td class="contenido">{{$equipo->NombrePais}}</td>
                                            <td class="contenido">{{$equipo->NombreCategoria}}</td>
                                            <td >
                                            <a href=""class="Boton red displayBoton " data-bs-toggle="modal" data-bs-target="#equipo{{$equipo->IdEquipo}}{{$equipo->IdCategoria}}" > Eliminar </a>
                                            {{-- Modal --}}
                                                        <div class="modal fade" id="equipo{{$equipo->IdEquipo}}{{$equipo->IdCategoria}}" tabindex="-1" aria-labelledby="equipo{{$equipo->IdEquipo}}{{$equipo->IdCategoria}}Label" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="equipo{{$equipo->IdEquipo}}{{$equipo->IdCategoria}}Label">Eliminar Técnico</h1>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img class="card-img-top" src="{{asset('storage').'/'.$equipo->LogoEquipo}}" alt="Logo del Equipo">
                                                                        <p> <b>¿</b> Desea eliminar los datos del equipo {{$equipo->NombreEquipo}} <br> 
                                                                        de la <b>Categoria: {{$equipo->NombreCategoria}}?</b>   </p>
                                                                    </div>
                                                                    <form method="POST" action="/equipo/lista/{{$equipo->IdEquipo}}/{{$equipo->IdCategoria}}">
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
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


    </body>
</html>