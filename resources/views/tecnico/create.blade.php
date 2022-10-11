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
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="{{asset('css/styleCuerpoTecnico.css')}}">

    </head>
    <body class="antialiased">
        <header >
            <!-- Grey with black text -->
            <nav class="navbar navbar-expand-sm navbar-light">
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
                        <a class="nav-link" href="#"></a>
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

            <div class="col-7 p-4 mx-auto contenedorForm" >
                <form action="{{ url('/tecnico/create/'.$idTecnico)}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="d-flex justify-content-center mb-4 border-bottom">
                        <h1 class="tituloFomulario">INSCRIPCION DE CUERPO TECNICO</h1>
                    </div>
                    <div class="row">
                        <div class="col-4" id="columna1">
                            <div class="form-group mb-3" style="display: none">
                                <label for="" class="form-label">Equipo:</label>
                                <input type="number" class="form-control" placeholder="Ingresar idEquipo" id="idEquipo" name="idEquipo" value="{{$idTecnico}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" placeholder="Ingresar nombre" id="nombre" name="nombre" value="{{ old('nombre') }}">
                                @error('nombre')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">CI:</label>
                                <input type="text" class="form-control" placeholder="Ingrese su CI" id="ci" name="ci" value="{{ old('ci') }}">
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
                                <input type="date" class="form-control" placeholder="Ingrese su fecha" id="fechaNacimiento" name="fechaNacimiento"
                                    value="{{ old('fechaNacimiento') }}" min="{{$fecha}}" max="{{$fechaActual}}">
                                @error('fechaNacimiento')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="sel1" class="form-label">Posicion:</label>
                                <select class="form-select" id="selectRol" name="selectRol">
                                    <option value="Entrenador principal" {{ old('selectRol') == 'Entrenador principal' ? 'selected' : '' }}>Entrenador principal</option>
                                    <option value="Entrenador asistente" {{ old('selectRol') == 'Entrenador asistente' ? 'selected' : '' }}>Entrenador asistente</option>
                                    <option value="Preparador físico" {{ old('selectRol') == 'Preparador físico' ? 'selected' : '' }}>Preparador físico</option>
                                    <option value="Medico" {{ old('selectRol') == 'Medico' ? 'selected' : '' }}>Medico</option>
                                    <option value="Asistente tecnico" {{ old('selectRol') == 'Asistente tecnico' ? 'selected' : '' }}>Asistente tecnico</option>
                                    <option value="Asistente estadistico" {{ old('selectRol') == 'Asistente estadistico' ? 'selected' : '' }}>Asistente estadistico</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4" id="columna2">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Apellido Paterno:</label>
                                <input type="text" class="form-control" placeholder="Ingresar apellido paterno" id="apellidoPaterno" name="apellidoPaterno" value="{{ old('apellidoPaterno') }}">
                                @error('apellidoPaterno')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nacionalidad:</label>
                                <input type="text" class="form-control" placeholder="Ingrese la nacionalidad" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad') }}">
                                @error('nacionalidad')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Edad:</label>
                                <input type="text" class="form-control" placeholder="Ingrese la edad" id="edad" name="edad" value="{{ old('edad') }}">
                                @error('edad')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-4" id="columna3">
                            <div class="form-group mb-3 ">
                                <label for="" class="form-label">Apellido Materno:</label>
                                <input type="text" class="form-control" placeholder="Ingresar apellido materno" id="apellidoMaterno" name="apellidoMaterno" value="{{ old('apellidoMaterno') }}">
                                @error('apellidoMaterno')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Sexo:</label>
                                <select class="form-select" id="selectSexo" name="selectSexo" value="{{ old('selectSexo') }}">
                                    <option value="Maculino" {{ old('selectSexo') == 'Maculino' ? 'selected' : '' }}>Maculino</option>
                                    <option value="Femenino" {{ old('selectSexo') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="" class="form-label">Categoria:</label>
                                <select class="form-select" id="selectCategoria" name="selectCategoria" value="{{ old('selectCategoria') }}">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->IdCategoria}}" {{ old('selectCategoria') == "$categoria->IdCategoria" ? 'selected' : '' }}>{{$categoria->NombreCategoria}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group mb-6 col-6">
                            <label for="" class="form-label">Foto del tecnico (Resolucion 472x472):</label>
                            <input type="file" class="form-control" id="fotoTecnico" name="fotoTecnico" accept="image/*" value="{{ old('fotoTecnico') }}">
                            @error('fotoTecnico')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-6 col-6">
                            <label for="" class="form-label">Foto del carnet:</label>
                            <input type="file" class="form-control" id="fotoCarnet" name="fotoCarnet" accept="image/*" value="{{ old('fotoCarnet') }}">
                            @error('fotoCarnet')
                                <p class="error-message">{{ $message }}</p>
                             @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4 mb-4">
                        <button type="submit" class="btn btnFomulario">Inscribir</button>
                    </div>
                </form>
            </div>
    </body>
</html>
