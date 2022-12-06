<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Datos de la Preinscripcion</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleAplicacion.css')}}">
    </head>
    @extends('nav')
    @section('content')
    
        <body >
       
        @if( $aplicacion != null)
		<section class=" main-title text-center mt-3">

            <h1 class="display-6 mb-0  titJ" ><b>
                Datos de preinscripción de equipos
            </b> </h1>
            <b><p class="titJ">3er Torneo Internacional de Maxi Basquet</p></b>
            <div >
            <div class="container justify-content-center">
            
            </section>

            <section class="container pb-5 pt-3">
                <div class="row g-3 "  >
                    <div class=" row pb-3 mb-4 registro-aplicacion formulario border-top border-5 border-success mause-nulo">
                        <div class="d-flex justify-content-between mt-3">
                            <h5 class=""><b>Datos del Equipo</b> </h5>
                            <a type="button" href="{{ url('aplicaciones') }}" class="btn-sm boton mb-1"> Volver </a>
                        </div>
                        
                        <hr>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label"><b>Nombre de equipo:</b> </label>
                            <input class="form-control" id="inputEmail4" readonly="readonly" value="{{$aplicacion->NombreEquipo}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label"><b>Nombre del encargado:</b> </label>
                            <input class="form-control" id="inputPassword4" readonly="readonly" value="{{$aplicacion->NombreUsuario}}">
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="inputEmail4" class="form-label"><b>Categorias:</b></label>
                            </div>
                         
                            <div class=" d-inline-block">
                            @foreach($aplicacion->Categorias as $categoria)
                                <input name="option[]" class="form-check-input"  type="checkbox" checked disabled>
                                <label class="form-check-label" for="categoria30">{{$categoria}}</label>
                            @endforeach
                            </div>

                        </div>
                        
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label"><b>Correo Electrónico:</b> </label>
                            <input class="form-control" id="inputPassword4" readonly="readonly" value="{{$aplicacion->CorreoElectronico}}">
                        </div>
                        <div class="col-md-6">
                            <label for="pais" class="form-label"><b>Pais:</b> </label>
                            <input class="form-control" type="text" id="pais" readonly="readonly" value="{{$aplicacion->NombrePais}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label"><b>Telefono de contacto:</b> </label>
                            <div class="input-group">
                                <input type="text" class="form-control" readonly="readonly" id="specificSizeInputGroupUsername" value="{{$aplicacion->NumeroTelefono}}">
                            </div>
                        </div>
                    </div>

                    <div class=" row pb-3 pt-3 registro-aplicacion formulario  border-top border-5 border-success mause-nulo">
                        <h5><b>Datos de pago</b></h5>
                        <hr>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label"><b>Nro de Transcción:</b></label>
                            <input class="form-control" id="inputEmail4"  readonly="readonly" value="{{$aplicacion->NumeroTransaccion}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label"><b>Monto a pagar:</b></label>
                            <input class="form-control" id="inputPassword4" readonly="readonly" value="{{$aplicacion->MontoTransaccion}} $">
                        </div>
                        
                        <div class="col-md-6">
                            <div>
                                <label for="inputEmail4" class="form-label"><b>Foto Vaucher:</b> </label>
                            </div>
                            <div class="input-group">
                                <img src="{{asset('storage').'/'.$aplicacion->FotoVaucher}}" width="362" height="203">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label"><b>Fecha de depósito:</b> </label>
                            <input class="form-control" id="inputPassword4" readonly="readonly" value="{{$aplicacion->FechaTransaccion}}">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @else
        <h1>No encontrado</h1>
        @endif
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    @endsection


</html>