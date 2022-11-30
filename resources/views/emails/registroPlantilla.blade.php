<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prueba de email</title>
</head>
    
<body>
    <h1>{{$details ['title'] }}</h1>
    <p> {{ $details ['body'] }}</p>
    <p>Los datos de su inicio de sesion son los siguientes: </p>
    <p><b>Nombre de Usuario: {{$details['usuraio']}}</b></p>
    <p><b>Contraseña: {{$details['contrasenia']}}</b></p>
    <p>No comparta los datos de incio de sesión</p>
</body>

</html>