<><table class="table table-dark">
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
            <td>{{ $aplicaciones->IdAplicacion }}</td>
            <td>{{ $aplicaciones->IdPreinscripcion }}</td>
            <td>{{ $aplicaciones->IdPais }}</td>
            <td>{{ $aplicaciones->NombreUsuario }}</td>
            <td>{{ $aplicaciones->CorreoElectronico }}</td>
            <td>{{ $aplicaciones->NombreEquipo }}</td>
            <td>{{ $aplicaciones->Categorias }}</td>
            <td>{{ $aplicaciones->EstadoAplicacion }}</td>
        </tr>
    </tbody>
</table>