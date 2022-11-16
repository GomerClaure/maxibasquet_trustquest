<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
      
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/styleEditarJugador.css')}}">

</head>

<body class="antialiased">
    <header>

    </header>
    @php
    $vadido = "¡Valido!";
    $noVadido = "¡No valido!";
    @endphp
    @if (Session::has('mensajeErrorCamiseta'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorCamiseta')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorEdad'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorEdad')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorCategoria'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorCategoria')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorExiste'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorExiste')}}</h4>
    </div>
    @endif

    <div class="col-7 p-4 mx-auto contenedorForm">
        <form action="{{ url('editarJugadores/'.$datos->IdJugador)}}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            {{ method_field('PATCH')}}

            <div class="d-flex justify-content-center mb-4 border-bottom">
                <h1 class="tituloFomulario">ACTUALIZAR JUGADOR</h1>
            </div>
            <div class="row">
                <div class="col-4" id="columna1">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" placeholder="Ingresar nombre" id="nombre" name="nombre" value="{{ $datos->NombrePersona }}">
                        @error('nombre')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">CI:</label>
                        <input type="text" class="form-control" placeholder="Ingrese su CI" id="ci" name="ci" value="{{ $datos->CiPersona }}">
                        @error('ci')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    @php
                    date_default_timezone_set('America/La_Paz');
                    $fechaActual = date('Y-m-d');
                    $anio = date('Y')-100;
                    $fecha = $anio."-01-01"
                    @endphp
                    <div class="form-group mb-3 contFecha">
                        <label for="" class="form-label">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" placeholder="Ingrese su fecha" id="fechaNacimiento" name="fechaNacimiento" value="{{ $datos->FechaNacimiento}}" min="{{$fecha}}" max="{{$fechaActual}}">
                        @error('fechaNacimiento')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Peso:</label>
                            <input type="text" class="form-control" placeholder="Ingrese su peso" id="peso" name="peso" value="{{ $datos->PesoJugador }}">
                            @error('peso')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-3 ">
                            <label for="" class="form-label">Estatura (Ejm 1.70):</label>
                            <input type="text" class="form-control" placeholder="Ingrese su estatura" id="estatura" name="estatura" value="{{ $datos->EstaturaJugador }}">
                            @error('estatura')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="col-4" id="columna2">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Apellido Paterno:</label>
                        <input type="text" class="form-control" placeholder="Ingresar apellido paterno" id="apellidoPaterno" name="apellidoPaterno" value="{{ $datos->ApellidoPaterno }}">
                        @error('apellidoPaterno')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nacionalidad:</label>
                        <select class="form-select" id="selectNacionalidad" name="selectNacionalidad">
                            @foreach ($paises as $pais)
                            <option value="{{$pais->Nacionalidad}}" {{ $datos->NacionalidadPersona == "$pais->Nacionalidad" ? 'selected' : '' }}>{{$pais->Nacionalidad}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">Edad:</label>
                        <input type="text" class="form-control" placeholder="Ingrese la edad" id="edad" name="edad" value="{{ $datos->Edad }}">
                        @error('edad')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">N° Camiseta:</label>
                        <input type="text" class="form-control" placeholder="Ingrese el numero de camiseta" id="nCamiseta" name="nCamiseta" value="{{ $datos->NumeroCamiseta }}">
                        @error('nCamiseta')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-4" id="columna3">
                    <div class="form-group mb-3 ">
                        <label for="" class="form-label">Apellido Materno:</label>
                        <input type="text" class="form-control" placeholder="Ingresar apellido materno" id="apellidoMaterno" name="apellidoMaterno" value="{{ $datos->ApellidoMaterno}}">
                        @error('apellidoMaterno')
                        <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">Sexo:</label>
                        <select class="form-select" id="selectSexo" name="selectSexo">
                            <option value="Maculino" {{ $datos->SexoPersona == 'Maculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="Femenino" {{ $datos->SexoPersona == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">Categoria:</label>
                        <select class="form-select" id="selectCategoria" name="selectCategoria">
                            @foreach ($categorias as $categoria)
                            <option value="{{$categoria->IdCategoria}}" {{ $datos->IdCategoria == "$categoria->IdCategoria" ? 'selected' : '' }}>{{$categoria->NombreCategoria}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="sel1" class="form-label">Posicion:</label>
                        <select class="form-select" id="selectRol" name="posicion">
                            <option value="Base" {{ $datos->PosicionJugador == 'Base' ? 'selected' : '' }}>Base</option>
                            <option value="Escolta" {{ $datos->PosicionJugador == 'Escolta' ? 'selected' : '' }}>Escolta</option>
                            <option value="Alero" {{ $datos->PosicionJugador == 'Alero' ? 'selected' : '' }}>Alero</option>
                            <option value="Ala-Pivot" {{ $datos->PosicionJugador == 'Ala-Pivot' ? 'selected' : '' }}>Ala-Pivot</option>
                            <option value="Pivot" {{ $datos->PosicionJugador == 'Pivot' ? 'selected' : '' }}>Pivot</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="form-group mb-6 col-6">
                    <label for="" class="form-label">Foto del jugador (Resolucion 472x472):</label>
                    <input type="file" class="form-control" id="fotoJugador" name="fotoJugador" accept="image/*" value="{{ $datos->Foto }}">
                    @error('fotoJugador')
                    <p class="error-message">{{ $message }}</p>
                    @enderror

                    <div class="col-md-6 imagen mx-auto mt-2">
                        <img class="card-img-top" src="{{asset('storage').'/'.$datos->Foto}}" width="200" height="200">
                    </div>
                </div>

                <div class="form-group mb-6 col-6">
                    <label for="" class="form-label">Foto del carnet:</label>
                    <input type="file" class="form-control" id="fotoCarnet" name="fotoCarnet" accept="image/*" value="{{$datos->FotoCarnet}}">
                    @error('fotoCarnet')
                    <p class="error-message">{{ $message }}</p>
                    @enderror

                    <div class="col-md-8 imagen mx-auto mt-3">
                        <img class="card-img-top" src="{{asset('storage').'/'.$datos->FotoCarnet}}" width="200" height="200">
                    </div>
                </div>
            </div>

            <div class="d-flex mx-auto mt-4 mb-4 col-6">
                <button type="submit" class="botones btnFomulario">Actualizar</button>

                @php
                $categoriaActual="";
                foreach ($categorias as $key => $categoria) {
                if ($datos->IdCategoria == $categoria->IdCategoria) {
                $categoriaActual= $categoria->NombreCategoria;
                }
                }
                @endphp
                <a href="{{url('editarJugadores/'.$equipo->NombreEquipo.'/'.$categoriaActual)}}" class="botones btnCancelar">Cancelar</a>

            </div>
        </form>
    </div>
</body>

</html>