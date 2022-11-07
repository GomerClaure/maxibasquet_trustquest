<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/registrarPartidos')}}" method="POST">
        @csrf
        <label for="equipo1">Nombre Equipo</label>
        <input type="text" name="equipo1" id="equipo1">
        <label for="equipo2">Nombre Equipo</label>
        <input type="text" name="equipo2" id="equipo2">
        <label for="hora">Hora Partido</label>
        <input type="datetime" name="hora" id="hora">
        <label for="lugar">Lugar Partido</label>
        <input type="text" name="lugar" id="lugar">
        <label for="fecha">Fecha Partido</label>
        <input type="date" name="fecha" id="fecha">
        <button type="submit">Registrar</button>
    </form>
</body>
</html>