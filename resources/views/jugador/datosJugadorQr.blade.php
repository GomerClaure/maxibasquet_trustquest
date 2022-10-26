@extends('welcome')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/StyleJugadorQr.css' )}}" rel="stylesheet">
    <title>Datos Jugador</title>
</head>
</html>
@section('content')
<div class="container justify-content-center"">
    <section class=" main-title text-center">
        <h1 class="display-6 mb-0" >Datos del jugador</h1>
        <p>3er Torneo Internacional de Maxi Basquet</p>
    </section>
    <section class="card">
        <div class="row ">
            <div class="col-md-3">
                <div class="imagenJugador">
                    <img src="{{asset('storage').'\uploads\persona.jpg'}}" alt="Foto del jugador">
                </div>
            </div>
            <div class="col-md-6">
                <div class="jugador"> <p> <b>{{"Los pumas del campo"}} {{"+60"}} | {{"Delantero"}}</b></p> </div>
                <div class="nombreJugador">
                    <p>{{"Este Banquito Lopez"}}</p>
                </div>
                {{-- <label for="fotoDelJugador" class="form-label">Nombre Completo:</label> --}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="row">
                    <div class="col-lg-9">
                        Level 1: .col-sm-3
                      </div>
                </div>
                <div class="row filaDato">
                    <div class="col-lg-9">
                        Level 1: sm3
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row filaDato">
                    <div class="col-lg-9">
                        Level 1: .col-sm-3
                      </div>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        Level 1: sm3
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                Level 3: .col-sm-3
            </div>
            <div class="col-md-2">
                Level 4: .col-sm-3
            </div>
            <div class="col-md-2">
                Level 5: .col-sm-3
            </div>
            <div class="col-md-2">
                Level 6: .col-sm-3
            </div>
        </div>
        {{-- <div class="row ">
            <div class="col-md-6">
                <label for="fotoDelJugador" class="form-label">Nombre de Equipo:</label>
            </div>
            <div class="col-md-6">
                <label for="fotoDelJugador" class="form-label">Altura:</label>
            </div>
            <div class="col-md-6">
                <label for="fotoDelJugador" class="form-label">Peso:</label>
            </div>
            <div class="col-md-6">
                <label for="fotoDelJugador" class="form-label">Edad:</label>
            </div>
            <div class="col-md-6">
                <label for="fotoDelJugador" class="form-label">Nacionalidad:</label>
            </div>
            <div class="col-md-6">
                <label for="fotoDelJugador" class="form-label">Fecha de Nacimiento:</label>
            </div>
            <div class="col-md-6">
                <label for="fotoDelJugador" class="form-label">Camiseta:</label>
            </div>
        </div> --}}
    </section>
</div>
@endsection
