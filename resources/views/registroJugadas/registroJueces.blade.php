<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/styleRegistroJugadas.css')}}">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> --}}
</head>
<body>@extends('nav')
@section('content')
<div class="container">
  
</div>
<section class="navegacionRegistro">
  <div class="row-1">
  </div>
  <div class="row t-5">
      <div class="col-3"></div>
      <div class="col pasos">
        <h1 for="Holi">Asignar Jueces</h1>
        <form class="formularioLogin" action="{{url('/login')}}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf
          <div class="card login">
              <div class="card-body">
                  <div class="input-group">
                    <label  for="anotadorPrincipal" class="form-label">Anotador Principal:</label>
                    <div class="input-group col-md-12">
                      <select name="anotadorPrincipal" class="form-select" id="anotadorPrincipal" value={{ old('anotadorPrincipal') }}>
                        @foreach ($jueces as $juez)
                            <option >{{$juez->NombrePersona.' '.$juez->ApellidoPaterno}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="input-group">
                    <label  for="anotadorPrincipal" class="form-label">Anotador Asistente:</label>
                    <div class="input-group col-md-12">
                      <select name="anotadorPrincipal" class="form-select" id="anotadorPrincipal" value={{ old('anotadorPrincipal') }}>
                        @foreach ($jueces as $juez)
                            <option >{{$juez->NombrePersona.' '.$juez->ApellidoPaterno}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="input-group">
                    <label  for="anotadorPrincipal" class="form-label">Cronometrista:</label>
                    <div class="input-group col-md-12">
                      <select name="anotadorPrincipal" class="form-select" id="anotadorPrincipal" value={{ old('anotadorPrincipal') }}>
                        @foreach ($jueces as $juez)
                            <option >{{$juez->NombrePersona.' '.$juez->ApellidoPaterno}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="input-group">
                    <label  for="anotadorPrincipal" class="form-label">Apuntador:</label>
                    <div class="input-group col-md-12">
                      <select name="anotadorPrincipal" class="form-select" id="anotadorPrincipal" value={{ old('anotadorPrincipal') }}>
                        @foreach ($jueces as $juez)
                            <option >{{$juez->NombrePersona.' '.$juez->ApellidoPaterno}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn iniciar-sesion">Anterior</button>
                    <button type="submit" class="btn iniciar-sesion">Siguiente</button>
                  </div>
              </div>
          </div>
        </form>
      </div>
      <div class="col-3 "></div>
  </div>
  
  
</section>

@endsection
</html>