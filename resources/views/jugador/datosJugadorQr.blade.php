@extends('welcome')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/StyleJugadorQr.css' )}}" rel="stylesheet">
    <title>Datos Jugador</title>
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
                            <div class="col">
                                    <img class="card-img-top imagenJugador" src="{{asset('storage').'/'.$jugador->Foto}}" alt="Foto del jugador">
                            </div>
                            <div class="col-md-6">
                                <div class="jugador"> <p> <b>{{$jugador->NombreEquipo}} | {{$jugador->NombreCategoria }} | {{$jugador->PosicionJugador}}</b></p> </div>
                                <div class="nombreJugador">
                                    <p><b>
                                        <h3>Nombre: </h3>
                                        {{$jugador->NombrePersona}}
                                    </b></p>
                                    <p><b>
                                        <h3>Apellido Paterno: </h3>
                                        {{$jugador->ApellidoPaterno}}
                                    </b></p>
                                    <p><b>
                                        <h3>ApellidoMaterno: </h3>
                                        {{$jugador->ApellidoMaterno}}
                                    </b></p>
                                </div>
                            </div>
                            <div class="col carnet">
                                {{-- <h8>Documento de Identidad</h8> --}}
                                
                                <img class="card-img-top imagenCarnet" src="{{asset('storage').'/'.$jugador->FotoCarnet}}" alt="Foto del jugador">
                                <div id="zoom"></div>
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
                                        <label for="" class="tituloDeCelda">Sexo</label>
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
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Nro. Documento de Identidad </label>
                                    <label for="" class="contenidoCelda nro">{{$jugador->CiPersona}}</label>
                                </div>
                                
                            </div>
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Edad</label>
                                    <label for="" class="contenidoCelda">{{$jugador->Edad}}</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Peso</label>
                                    <label for="" class="contenidoCelda">{{$jugador->PesoJugador}}</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row celda">
                                    <label for="" class="tituloDeUnaCelda">Estatura</label>
                                    <label for="" class="contenidoCelda">{{$jugador->EstaturaJugador}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
    </div>

</div>
<script>
    
(function() {
  var zoom = document.getElementById( 'zoom' ),
      Zw = zoom.offsetWidth,
      Zh = zoom.offsetHeight,
      img = document.querySelector( '.card-img-top.imagenCarnet' );
      
  
  var timeout, ratio, Ix, Iy;

  function activate () {
    document.body.classList.add( 'active' );
  }
  
  function deactivate() {
    document.body.classList.remove( 'active' );
  }
  
  function updateMagnifier( x, y ) {
    zoom.style.top = ( y ) + 'px';
    zoom.style.left = ( x ) + 'px';
    zoom.style.backgroundPosition = (( Ix - x ) * ratio + Zw / 2 ) + 'px ' + (( Iy - y ) * ratio + Zh / 2 ) + 'px';
  }
  
  function onLoad () {
    ratio = img.naturalWidth / img.width;
    zoom.style.backgroundImage = 'url(' + img.src + ')';
    Ix = img.offsetLeft;
    Iy = img.offsetTop;
  }
  
  function onMousemove( e ) {
    clearTimeout( timeout );
    activate();
    updateMagnifier( e.x, e.y );
    timeout = setTimeout( deactivate, 2500 );
  }
  
  function onMouseleave () {
    deactivate();
  }

  img.addEventListener( 'load', onLoad );
  img.addEventListener( 'mousemove', onMousemove );
  img.addEventListener( 'mouseleave', onMouseleave );

})();
</script>
@endsection
