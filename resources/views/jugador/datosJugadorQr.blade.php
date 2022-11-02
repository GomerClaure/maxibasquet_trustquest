@extends('welcome')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/StyleJugadorQr.css' )}}" rel="stylesheet">
    <title>Datos Jugador QR</title>
</head>
</html>
@section('content')
<div class="justify-content-center">
    <section class=" main-title text-center">
        <h1>Datos del jugador</h1>
        {{-- <p>3er Torneo Internacional de Maxi Basquet</p> --}}
    </section>
    <div class="relative  items-top justify-center min-h-screen dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col">
                        <div class="row mainCard">
                            <div class="col jugador">
                                <img class="card-img-top imagenJugador" data-bs-toggle="modal" data-bs-target="#modalImgJugador" src="{{asset('storage').'/'.$jugador->Foto}}" alt="Foto del jugador">
                                {{-- Modal --}}
                                <div class="modal fade" id="modalImgJugador" tabindex="-1" aria-labelledby="modalImgJugadorLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalImgJugadorLabel">Foto del Jugador</h1>
                                            </div>
                                            <div class="modal-body">
                                                <img class="card-img-top" src="{{asset('storage').'/'.$jugador->Foto}}" alt="Foto del jugador">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn volver" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            <div class="col-md-5">
                                <div class="jugador"> <p> <b>{{$jugador->NombreEquipo}} | {{$jugador->NombreCategoria }} | {{$jugador->PosicionJugador}}</b></p> </div>
                                <div class="nombreJugador">
                                    <p><b>
                                        <p class="nombre">Nombre: </p>
                                        {{$jugador->NombrePersona}}
                                    </b></p>
                                    <p><b>
                                        <p class="nombre">Apellido Paterno: </p>
                                        {{$jugador->ApellidoPaterno}}
                                    </b></p>
                                    <p><b>
                                        <p class="nombre">ApellidoMaterno: </p>
                                        {{$jugador->ApellidoMaterno}}
                                    </b></p>
                                </div>
                            </div>
                            <div class="col carnet ">
                            </div>
                        </div>
                        <div class="row data">
                            <div class="col dosFilas">
                                <div class="row filaDato">
                                    <div class="col-lg-9">
                                        <label for="" class="tituloDeCelda">Nro. Camiseta</label>
                                        <br>
                                        <label for="" class="contenidoCelda">{{$jugador->NumeroCamiseta}}</label>
                                      </div>
                                </div>
                                <div class="row filaDato">
                                    <div class="col-lg-9">
                                        <label for="" class="tituloDeCelda">Genero</label>
                                        <br>
                                        <label for="" class="contenidoCelda">{{$jugador->SexoPersona}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col dosFilas" >
                                <div class="row filaDato">
                                    <div class="col-lg-9">
                                        <label for="" class="tituloDeCelda">Nacionalidad</label>
                                        <br>
                                        <label for="" class="contenidoCelda">{{$jugador->NacionalidadPersona}}</label>
                                      </div>
                                </div>
                                <div class="row filaDato">
                                    <div class="col-lg-9">
                                        <label for="" class="tituloDeCelda">Fecha de nacimiento</label>
                                        <label for="" class="contenidoCelda">{{$jugador->FechaNacimiento}}</label>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Nro. Documento de Identidad </label>
                                    <label for="" class="contenidoCelda nro">{{$jugador->CiPersona}}</label>
                                </div>
                                
                            </div> --}}
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Edad</label>
                                    <label for="" class="contenidoCelda">{{$jugador->Edad." años"}}</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Peso</label>
                                    <label for="" class="contenidoCelda">{{$jugador->PesoJugador." kg"}}</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Altura</label>
                                    <label for="" class="contenidoCelda">{{$jugador->EstaturaJugador." m"}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
    </div>

</div>
@endsection
