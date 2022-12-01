<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Registra Partidos</title>
    <link rel="stylesheet" href="{{asset('css/StyleRegistrarPartidos.css')}}">
</head>

<body class="background-color">
    @php
    $vadido = "¡Valido!";
    $noVadido = "¡No valido!";
    @endphp


    @if (Session::has('mensajeErrorEquipos'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorEquipos')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorCategoria'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorCategoria')}}</h4>
    </div>
    @endif

   

    @if (Session::has('mensajeErrorCantidadJugadores'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorCantidadJugadores')}}</h4>
    </div>
    @endif


    @if (Session::has('mensajeErrorMismoPartido'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorMismoPartido')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorHoraMin'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorHoraMin')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorFecha'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorFecha')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorHora'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorHora')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeValidoRegistro'))
    <div class="alert alert-success alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$vadido}}</strong>{{" "}}{{Session::get('mensajeValidoRegistro')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorFechaMisma'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorFechaMisma')}}</h4>
    </div>
    @endif


    <div>
        <div class="container justify-content-center"">
		<section class=" main-title text-center">
            <h1 class="display-6 mb-0 color-letras">Registro de Partidos</h1>
            <p class="color-letras">3er Torneo Internacional de Maxi Basquet</p>
            </section>
            <section class="col-7 p-4 mx-auto contenedorForm">
                <form class="row g-1" action="{{url('/registrarPartidos')}}" method="POST" novalidate>
                    @csrf
                    <div class="col-md-6">
                    </div>
                    <div class=" row pb-3 mb-4 registro-datos  color-form  border-top border-5 border-success">
                        <hr>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nombre de equipo A</label>
                            <select class="form-select" id="selectEquipoA" name="selectEquipoA" value="{{ old('selectEquipoA') }}">
                                @foreach ($equipos as $equipo)
                                <option value="{{$equipo->NombreEquipo}}" {{ old('selectEquipoA') == "$equipo->NombreEquipo" ? 'selected' : '' }}>{{$equipo->NombreEquipo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Nombre de Equipo B</label>
                            <select class="form-select" id="selectEquipoB" name="selectEquipoB" value="{{ old('selectEquipoB') }}">
                                @foreach ($equipos as $equipo)
                                <option value="{{$equipo->NombreEquipo}}" {{ old('selectEquipoB') == "$equipo->NombreEquipo" ? 'selected' : '' }}>{{$equipo->NombreEquipo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="inputEmail4" class="form-label">Categorias:</label>
                            </div>
                            <div>
                                <select class="form-select" id="selectCategoria" name="selectCategoria" value="{{ old('selectCategoria') }}">
                                    @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->NombreCategoria}}" {{ old('selectCategoria') == "$categoria->NombreCategoria" ? 'selected' : '' }}>{{$categoria->NombreCategoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('option')
                            <p class="error-message">{{$message}}</p>
                            @enderror
                        </div>

                        @php
                        date_default_timezone_set('America/La_Paz');
                        $fechaActual = date('Y-m-d');
                        $anio = date('Y')+2;
                        $fecha = $anio."-01-01"
                        @endphp
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Fecha</label>
                            <input class="form-control" id="inputPassword4" type="date" name="fecha" value="{{ old('fecha') }}" min="{{$fechaActual}}" max="{{$fecha}}">
                            @error('fecha')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Lugar</label>
                            <input class="form-control" id="inputPassword4" type="text" name="lugar" value="{{ old('lugar') }}">
                            @error('lugar')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Hora</label>
                            <div>
                                <input type="time" class="form-control" id="hora" name="hora" value="{{ old('hora') }}" min="9:00" max="22:00">
                            </div>
                            @error('hora')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12 text-center margen">
                        <button type="submit" class="boton-color btn btn-primary">Registrar</button>
                        <input type="button" class="boton-color btn btn-primary" value="Cancelar">
                    </div>
                </form>
            </section>
        </div>
</body>

</html>