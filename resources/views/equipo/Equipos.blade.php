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

@foreach($datos as $dato)
<div style="text-align:center">
    <h1>{{$dato->NombreEquipo}}</h1>
</div>
@endforeach
{{$datosjugador}}
<div>
  <h1 class="TituloPais">Pais:</h1>
</div>

<div class="listaEquipo">
<div class="listaJugadores">
    <h2>Jugadores</h2>
    <div class="card" style="width: 18rem;" >
  <img src="imagenes/foto.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nombre del Jugador</h5>
    <p class="card-text">En que pocision juega</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  <br>
<div class="card" style="width: 18rem;" >
  <img src="imagenes/foto.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nombre del Jugador2</h5>
    <p class="card-text">En que pocision juega2</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

</div>

<div class="listaCuerpoT">
<h2>Cuerpo Tecnico</h2>
<div class="card" style="width: 18rem;" >
  <img src="imagenes/foto.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nombre del Cuerpo Tecnico</h5>
    <p class="card-text">Cargo dentro del cuerpo tecnico</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<br>
<div class="card" style="width: 18rem;" >
  <img src="imagenes/foto.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Nombre del Cuerpo Tecnico2</h5>
    <p class="card-text">Cargo dentro del cuerpo tecnico2</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>
</div>
</body>
</html>