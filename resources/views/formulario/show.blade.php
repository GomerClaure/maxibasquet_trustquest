<>
    <table class="table table-dark">
        <thead class="thead-dark">
            <tr>
                <th>IdAplicacion</th>
                <th>IdPreinscripcion</th>
                <th>IdPais</th>
                <th>NombreUsuario</th>
                <th>CorreoElectronico</th>
                <th>NombreEquipo</th>
                <th>Categorias</th>
                <th>EstadoAplicacion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aplicaciones as $aplicacion)
            <tr>
                <td>{{$aplicacion->IdPreinscripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>