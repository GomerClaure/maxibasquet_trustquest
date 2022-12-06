<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos Maxi Basquet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleMostrarEquipo.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@900&display=swap" rel="stylesheet">
      </head>
@extends('nav')
@section('content')
  <h1 class="tituloEquipos">Equipos Campeonato Maxi Basquet</h1>
<div class="equipos-card">
@foreach($arreglo as $copia)
<div class="card cardEquipo" style="width: 4 0rem;">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6 imagen">
        <img class="card-img-top"src="{{asset('storage').'/'.$copia['LogoEquipo']}}" alt="">
      </div>  
    <div class="col-md-6">
      <h5 class="card-title">Nombre Equipo: {{$copia['NombreEquipo']}}</h5>
      <h5 class="card-title">Pais Equipo: {{$copia['NombrePais']}}</h5>
      @foreach($copia['Categorias'] as $x)
        <h5>Categoria: {{$x['id']}}</h5>
        <a href="{{url('jugadores'.'/'.$copia['NombreEquipo'].'/'.$x['id'])}}" type="button" class="btn btn-primary">Jugadores</a>
        <a href="{{url('tecnicos'.'/'.$copia['NombreEquipo'].'/'.$x['id'])}}" class="btn btn-primary">Cuerpo Técnico</a>
        @endforeach
    </div>
    </div>
  </div>
</div>
@endforeach
</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</html>