<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/StyleSubirLogo.css' )}}">
    <title>Subir Logo</title>
</head>
<body>
    
</body>
</html>
@extends('welcome')
@section('content')
<div class="container justify-content-center"">
    <section class=" main-title ">
        <h1 class="display-6 mb-0" >Subir logotipo de equipo</h1>
        <p>3er Torneo Internacional de Maxi Basquet</p>
    </section>
    <section class="form mx-5">
        <div class="row">
            <div class="col-md-6">
                <label for="nombreDeEquipo" class="form-label">Nombre de equipo:</label>
                <input name="nombreDeEquipo" type="text" class="form-control" id="nombreDeEquipo" value="{{ $equipo->NombreEquipo}}">
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <img src="{{asset('storage').$equipo->LogoEquipo}}" width="362" height="203">
                </div>
                <label for="nombreDeEquipo" class="form-label">Logotipo del equipo:</label>
                <div class="input-group">
                    <input name="vaucherDePago" type="file" class="form-control" id="vaucherDePago" accept="image/*" aria-label="Upload" value="{{old("vaucherDePago")}}">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn botonPreinscripcion">Preinscribir Equipo</button>
            </div>
        </div>
        
    </section>
</div>
@endsection