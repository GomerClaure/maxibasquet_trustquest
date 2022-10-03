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
        <tr>
            <td>{{ $aplicacion->IdAplicacion }}</td>
            
            <td>{{ $aplicacion->IdPreinscripcion }}</td>
            <td>{{ $aplicacion->IdPais }}</td>
            <td>{{ $aplicacion->NombreUsuario }}</td>
            <td>{{ $aplicacion->CorreoElectronico }}</td>
            <td>{{ $aplicacion->NombreEquipo }}</td>
            <td>{{ $aplicacion->Categorias }}</td>
            <td>{{ $aplicacion->EstadoAplicacion }}</td>
            <td>
            

            </td>
        </tr>
       
    </tbody>
</table>