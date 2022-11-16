<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Personal Maxi Basquet</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleDatosJugador.css')}}">
    </head>
    <body>
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
        <div class="relative  items-top justify-center min-h-screen dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

                <div class="">
                    <div class="mask d-flex  align-items-center w-100">
                    <div class="container  ">
                        <div class="d-flex justify-content-center ">
                            <h3> <b> DATOS DE PERSONAL TÉCNICO</b> </h3>
                        </div>
                        <div class="row">
                        <div class="col-2">

                        </div>
                        <div class="col">
                        <div class="card ">
                            <div class="card-body  pt-3 ps-3 ">
                                <div class="d-flex justify-content-end pb-2">
                                <a type="button" href="{{ url('tecnicos'.'/'.$tecnico->NombreEquipo.'/'.$tecnico->NombreCategoria)}}" class="btn btn-primary btn-sm boton"> Volver </a>
                                </div>
                                <div class="row ">
                                    <div class="col-4 ">
                                        <div class="card">
                                                <img class="card-img-top"src="{{asset('storage').'/'.$tecnico->Foto}}" alt="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="jugador"> <p> <b>{{$tecnico->NombreEquipo}} {{$tecnico->NombreCategoria}} | {{$tecnico->RolesTecnicos}}</b></p> </div>
                                        <div>
                                            <h4 class="transformacion2"> <b>{{$tecnico->NombrePersona}}</b></h4>
                                        </div>
                                        <div>
                                            <h4 class="transformacion2"><b>{{$tecnico->ApellidoPaterno}} {{$tecnico->ApellidoMaterno}}</b></h4>
                                        </div>
                                        <div class=" table-responsive table-scroll rounded-0  w-75 " data-mdb-perfect-scrollbar="true" style="position: relative; ">
                                            <table class=" table  mb-0 text-center  d-flex justify-content-center">

                                                <tbody  >
                                                    <tr>
                                                        <td class="border border-dark">
                                                            <div> <p><b>Edad</b></p> </div>
                                                            <div><p>{{$tecnico->Edad}}</p></div>
                                                        </td>
                                                        <td class="border border-dark">
                                                            <div> <p><b>Nacimiento</b></p> </div>
                                                            <div><p>{{$tecnico->FechaNacimiento}}</p></div>
                                                        </td>
                                                        <td class="border border-dark">
                                                            <div> <p><b>Nacionalidad</b></p> </div>
                                                            <div><p>{{$tecnico->NacionalidadPersona}}</p></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-2   "></div>
                        </div>


                    </div>
                </div>
            </div>

        </div>

    </body>
</html>