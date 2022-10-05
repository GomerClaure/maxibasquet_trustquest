<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos Maxi Basquet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link  href="{{asset('/css/StyleMostrarEquipo.css')}}" rel="stylesheet">
</head>
<body>

@foreach($EquipoPais as $dato)
<div style="text-align:center">
    <h1>{{$dato->NombreEquipo}}</h1>
</div>
@endforeach


<div>
  <h1 class="TituloPais">Pais:</h1>
</div>

<div class="listaEquipo">

<div class="listaJugadores">
    <h2>Jugadores</h2>
    @foreach($informacion as $jugado)

<div class="card" style="width: 18rem;" >
  <img src="{{ $jugado->Foto }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$jugado->NombrePersona}} {{$jugado->ApellidoPaterno}} {{$jugado->ApellidoMaterno}}</h5>
    <a href="#" class="btn btn-primary">Detalles</a>
  </div>
</div>
<br>
@endforeach
</div>

<div class="listaCuerpoT">

<h2>Cuerpo Tecnico</h2>
@foreach($informaciontecnicos as $tec)

<div class="card" style="width: 18rem;" >
  <img src="{{ $tec->Foto }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$tec->NombrePersona}} {{$tec->ApellidoPaterno}} {{$tec->ApellidoMaterno}}</h5>
    <a href="#" class="btn btn-primary">Detalles</a>
  </div>
</div>
<br>
@endforeach

</div>

</div>
</body>
</html>