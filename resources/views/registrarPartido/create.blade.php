<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Preinscripcion</title>
    <link rel="stylesheet" href="{{asset('css/StyleRegistrarPartidos.css')}}">
</head>

<body class="background-color">
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

    @if (Session::has('mensajeErrorEquipoA'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorEquipoA')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorEquipoB'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorEquipoB')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorCategoriaB'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorCategoriaB')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorCategoriaA'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorCategoriaA')}}</h4>
    </div>
    @endif

    @if (Session::has('mensajeErrorFecha'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeErrorFecha')}}</h4>
    </div>
    @endif

    <div>
        <div class="container justify-content-center"">
		<section class=" main-title text-center">
            <h1 class="display-6 mb-0 color-letras">Registro de Partidos</h1>
            <p class="color-letras">3er Torneo Internacional de Maxi Basquet</p>
            </section>
            <section class="col-7 p-4 mx-auto contenedorForm">
                <form class="row g-1" action="{{url('/registrarPartidos')}}" method="POST">
                    @csrf
                    <div class="col-md-6">
                    </div>
                    <div class=" row pb-3 mb-4 registro-datos  color-form  border-top border-5 border-success">
                        <hr>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nombre de equipo A</label>
                            <input class="form-control" id="inputEmail4" name="equipoA" value="{{old('equipoA')}}">
                            @error('equipoA')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Nombre de Equipo B</label>
                            <input class="form-control" id="inputPassword4" name="equipoB" value="{{ old('equipoB') }}">
                            @error('equipoB')
                            <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="inputEmail4" class="form-label">Categorias:</label>
                            </div>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input name="option[]" class="form-check-input" type="checkbox" id="categoria30" value="+30">
                                    <label class="form-check-label" for="categoria30">+30</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="option[]" class="form-check-input" type="checkbox" id="categoria30" value="+35">
                                    <label class="form-check-label" for="categoria35">+35</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="option[]" class="form-check-input" type="checkbox" id="categoria40" value="+40">
                                    <label class="form-check-label" for="categoria40">+40</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="option[]" class="form-check-input" type="checkbox" id="categoria45" value="+45">
                                    <label class="form-check-label" for="categoria45">+45</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="option[]" class="form-check-input" type="checkbox" id="categoria50" value="+50">
                                    <label class="form-check-label" for="categoria50">+50</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="option[]" class="form-check-input" type="checkbox" id="categoria55" value="+55">
                                    <label class="form-check-label" for="categoria55">+55</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="option[]" class="form-check-input" type="checkbox" id="categoria60" value="+60">
                                    <label class="form-check-label" for="categoria60">+60</label>
                                </div>
                            </div>
                            @error('option')
                            <p class="error-message">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="inputPassword4" class="form-label">Fecha</label>
                            <input class="form-control" id="inputPassword4" type="date" name="fecha" value="{{ old('fecha') }}">
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
                                <input type="time" class="form-control" id="hora" name="hora" value="{{ old('hora') }}">
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