{{$datos}}
@if(!empty($datos))
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Preinscripcion</title>
    <style>
        .mause-nulo {
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div style="background: #e9e9e9;">
        <div class="container justify-content-center"">
		<section class=" main-title text-center">
            <h1 class="display-6 mb-0" style="color:#37474f">Formulario de preinscripción de equipos</h1>
            <p>3er Torneo Internacional de Maxi Basquet</p>
            </section>
            <section class="form">
                <form class="row g-3 " action="{{url('/formulario/'.$datos->IdAplicacion)}}" method="post">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class=" row pb-3 mb-4 registro-datos bg-white  border-top border-5 border-success mause-nulo">
                        <h5>Datos del equipo</h5>
                        <hr>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nombre de equipo:</label>
                            <input class="form-control" id="inputEmail4" value="{{$datos->NombreEquipo}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Nombre del encargado:</label>
                            <input class="form-control" id="inputPassword4" value="{{$datos->NombreUsuario}}">
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="inputEmail4" class="form-label">Categorias:</label>
                            </div>

                            <div class="form-check form-check-inline">

                                <label class="form-check-label" for="inlineCheckbox1">{{$datos->Categorias}}</label>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Correo Electronico:</label>
                            <input class="form-control" id="inputPassword4" value="{{$datos->CorreoElectronico}}">
                        </div>
                        <div class="col-md-6">
                            <label for="pais" class="form-label">Pais:</label>
                            <input type="text" id="pais" value="{{$datos->NombrePais}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Telefono de contacto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="specificSizeInputGroupUsername" value="{{$datos->NumeroTelefono}}">
                            </div>
                        </div>
                    </div>

                    <div class=" row pb-3 registro-datos bg-white  border-top border-5 border-success mause-nulo">
                        <h5>Datos de pago</h5>
                        <hr>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nro de Transcción:</label>
                            <input class="form-control" id="inputEmail4" value="{{$datos->NumeroTransaccion}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Monto a pagar:</label>
                            <input class="form-control" id="inputPassword4" value="{{$datos->MontoTransaccion}}">
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label for="inputEmail4" class="form-label">Foto Vaucher:</label>
                            </div>
                            <div class="input-group">
                                <img src="{{asset('storage').'/'.$datos->FotoVaucher}}" width="362" height="203">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Fecha de depósito:</label>
                            <input class="form-control" id="inputPassword4" value="{{$datos->FechaTransaccion}}">
                        </div>
                    </div>
                    <div class="col-md-12 text-center margen">
                        <input type="submit" class="btn btn-primary" name="aceptado" id="aceptado" value="aceptado">
                        <input type="submit" class="btn btn-primary" name="rechazado" id="rechazado" value="rechazado">

                    </div>

                </form>
            </section>
        </div>
</body>

</html>
@else
<h1>no existe formulario</h1>
@endif