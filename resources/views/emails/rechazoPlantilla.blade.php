<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Email de rechazo</title>
</head>
    
<body>
    <h1>{{$details ['title'] }}</h1>
    <p> {{ $details ['body'] }}</p>
    <p>Las razones del rechazo son las siguientes: </p>
    <p><b> {{$details['contenido']}}</b></p>
    <p>Corrija las observaciones o pongase en contacto con el administrador para más información</p>
</body>

</html>