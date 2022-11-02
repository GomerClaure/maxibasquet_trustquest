@extends('welcome')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/StyleTecnicoQr.css' )}}" rel="stylesheet">
    <title>Datos Tecnico QR</title>
</head>
</html>
@section('content')
<div class="justify-content-center">
    <section class=" main-title text-center">
        <h1>Datos de Personal Tecnico </h1>
        {{-- <p>3er Torneo Internacional de Maxi Basquet</p> --}}
    </section>
    <div class="relative  items-top justify-center min-h-screen dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col">
                        <div class="row mainCard">
                            <div class="col jugador">
                                <img class="card-img-top imagenJugador" data-bs-toggle="modal" data-bs-target="#modalImgJugador" src="{{asset('storage').'/'.$tecnico->Foto}}" alt="Foto del jugador">
                                {{-- Modal --}}
                                <div class="modal fade" id="modalImgJugador" tabindex="-1" aria-labelledby="modalImgJugadorLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalImgJugadorLabel">Foto del Técnico</h1>
                                            </div>
                                            <div class="modal-body">
                                                <img class="card-img-top"  src="{{asset('storage').'/'.$tecnico->Foto}}" alt="Foto del tecnico">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn volver" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            <div class="col-md-5">
                                <div class="jugador"> <p> <b>{{$tecnico->NombreEquipo}} | {{$tecnico->NombreCategoria }} | {{$tecnico->RolesTecnicos}}</b></p> </div>
                                <div class="nombreJugador">
                                    <p><b>
                                        <p class="nombre">Nombre: </p>
                                        {{$tecnico->NombrePersona}}
                                    </b></p>
                                    <p><b>
                                        <p class="nombre">Apellido Paterno: </p>
                                        {{$tecnico->ApellidoPaterno}}
                                    </b></p>
                                    <p><b>
                                        <p class="nombre">ApellidoMaterno: </p>
                                        {{$tecnico->ApellidoMaterno}}
                                    </b></p>
                                </div>
                            </div>
                            <div class="col carnet ">
                            </div>
                        </div>
                        <div class="row data">
                            <div class="col-3">
                            </div>
                            <div class="col dosFilas" >
                                <div class="row filaDato">
                                    <div class="col-lg-9">
                                        <label for="" class="tituloDeCelda">Nacionalidad</label>
                                        <br>
                                        <label for="" class="contenidoCelda">{{$tecnico->NacionalidadPersona}}</label>
                                      </div>
                                </div>
                                <div class="row filaDato">
                                    <div class="col-lg-9">
                                        <label for="" class="tituloDeCelda">Fecha de nacimiento</label>
                                        <br>
                                        <label for="" class="contenidoCelda">{{$tecnico->FechaNacimiento}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Edad</label>
                                    <label for="" class="contenidoCelda">{{$tecnico->Edad." años"}}</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Genero</label>
                                    <label for="" class="contenidoCelda">{{{$tecnico->SexoPersona}}}</label>
                                </div>
                            </div>
                            <div class="col-3">
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
    </div>

</div>
@endsection
