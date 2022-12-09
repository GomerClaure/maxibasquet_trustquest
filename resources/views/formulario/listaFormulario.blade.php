<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplicaciones de preinscripción</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    </style>

    <style>

        

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="{{asset('css/StyleFormulario.css')}}">
    <link rel="stylesheet" href="{{asset('css/StyleTablaAplicaciones.css')}}">
</head>
@extends('nav')
@section('content')
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

    @if (Session::has('mensajeRechazado'))
    <div class="alert alert-warning alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4><strong>{{$noVadido}}</strong>{{" "}}{{Session::get('mensajeRechazado')}}</h4>
    </div>
    @endif
<body class="antialiased background-color">
    <div class="relative  items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0 ">
        <div class="bg-image w-100">
            <div class="mask d-flex align-items-center w-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h3 class="color-letras">Equipos Preinscritos</h3>
                            <h5 class="color-letras">3er Torneo Internacional de Maxi Basquet</h5>
                            <div class="card contenedor">
                                <div class="ps-3 py-2">
                                    <h4>Lista Detallada</h4>
                                </div>
                                <div class="card-body  pt-0 ps-3 ">
                                    <div class="table-responsive table-scroll rounded-0" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                                        <table class="table table-striped table-borderless border-dark  mb-0 text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Nombre de Equipo </th>
                                                    <th>Observaciones</th>
                                                    <th>Estado de Preinscripcion</th>
                                                    <th>Detalles</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($aplicaciones as $aplicacion)
                                                <tr>
                                                    <td>{{$aplicacion->NombreEquipo}}</td>
                                                    <td>{{$aplicacion->observaciones}} </td>
                                                    <td>{{$aplicacion->EstadoAplicacion}}</td>
                                                    <td class="d-grid gap-2">
                                                        <a type="button" class="boton-color btn-sm rounded-0 boton" href="{{url('formulario'.'/'.$aplicacion->IdAplicacion)}}">Detalles</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
</html>