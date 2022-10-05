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
</head>
<body>

@foreach($c as $dato)
<div style="text-align:center" class="tituloequipo">
    <h1>{{$dato->NombreEquipo}}</h1>
</div>
@endforeach

@foreach($c as $pais)
<div class="TituloPais">
    <h1>Pais: {{$pais->NombrePais}}</h1>
</div>
@endforeach

@foreach($categoria as $cats)
<div class="TituloCategoria">
    <h1>Categoria: {{$cats->NombreCategoria}}</h1>
</div>
@endforeach
<div class="listaEquipo">

<div class="listaJugadores">
    <h2>Jugadores</h2>
    @foreach($informacion as $jugado)

<div class="card" style="width: 18rem;" >
<img class="card-img-top"src="{{asset('storage').'/'.$jugado->Foto}}" alt="">
  <div class="card-body">
    <h5 class="card-title">{{$jugado->NombrePersona}} {{$jugado->ApellidoPaterno}} {{$jugado->ApellidoMaterno}}</h5>
    <a href="#" class="btn">Detalles</a>
  </div>
</div>
<br>
@endforeach
</div>

<div class="listaCuerpoT">

<h2>Cuerpo Tecnico</h2>

@foreach($informaciontecnicos as $tec)

<div class="card" style="width: 18rem;" >
<img class="card-img-top" src="{{asset('storage').'/'.$tec->Foto}}" alt="">
  <div class="card-body">
    <h5 class="card-title">{{$tec->NombrePersona}} {{$tec->ApellidoPaterno}} {{$tec->ApellidoMaterno}}</h5>
    <br>
  </div>
</div>
<br>
@endforeach

</div>

</div>
</body>
</html>