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
    <h1>Nombre del equipo</h1>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>idEquipo</th>
                <th>ideDelegado</th>
                <th>idAplicacion</th>
                <th>Nombre</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
        @foreach($datos as $dato)
            <tr>
                <td>{{$dato->idEquipo}}</td>
                <td>{{$dato->idDelegado}}</td>
                <td>{{$dato->idAplicacion}}</td>
                <td>{{$dato->NombreEquipo}}</td>
                <td>{{$dato->LogoEquipo}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>