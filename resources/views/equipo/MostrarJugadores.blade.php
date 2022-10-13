<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/StyleMostrarJugador.css')}}">
    <title>Document</title>
</head>
<body>
    <h1>Mostrar jugadores de un equipo</h1>
    @foreach($jugadores as $mj)
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{asset('storage').'/'.$datosEquipo->LogoEquipo}}">
  <div class="card-body">
    <h5 class="card-title">{{$datosEquipo->NombreEquipo}}</h5>
    <p class="card-text">Pais: {{$datosEquipo->NombrePais}} <br>
                           Categoria: {{$datosEquipo->NombreCategoria}}</p>
    <a href="{{url('MostrarJugadores')}}" class="btn btn-primary">Jugadores</a>
    <a href="{{url('MostrarTecnicos')}}" class="btn btn-primary">Cuerpo Tecnico</a>
  </div>
</div>
@endforeach
</body>
</html>