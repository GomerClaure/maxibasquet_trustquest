<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registro Jueces</title>
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
        @if (Session::has('errorJueces'))
            <div class="alert alert-danger alert-dismissible d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <p>{{Session::get('errorJueces')}}</p>
            </div>
        @endif
        <form class="formularioRegistro" action="{{route('registrarJueces',['id' => $id])}}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf
          <div class="card login">
              <div class="card-body">
                  <div class="input-group">
                    <label  for="anotadorPrincipal" class="form-label">Anotador Principal:</label>
                    <div class="input-group col-md-12">
                      <select name="anotadorPrincipal" class="form-select" id="anotadorPrincipal" value={{ old('anotadorPrincipal') }}>
                        @foreach ($jueces as $key =>  $juez)
                            <option value="{{$juez->IdJuez}}">{{($key+1).'.-  '.$juez->NombrePersona.' '.$juez->ApellidoPaterno}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="input-group">
                    <label  for="anotadorAsistente" class="form-label">Anotador Asistente:</label>
                    <div class="input-group col-md-12">
                      <select name="anotadorAsistente" class="form-select" id="anotadorAsistente" value={{ old('anotadorAsistente') }}>
                        @foreach ($jueces as $key => $juez)
                            <option value="{{$juez->IdJuez}}">{{($key+1).'.-  '.$juez->NombrePersona.' '.$juez->ApellidoPaterno}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="input-group">
                    <label  for="cronometrista" class="form-label">Cronometrista:</label>
                    <div class="input-group col-md-12">
                      <select name="cronometrista" class="form-select" id="cronometrista" value={{ old('cronometrista') }}>
                        @foreach ($jueces as $key => $juez)
                            <option value="{{$juez->IdJuez}}">{{($key+1).'.-  '.$juez->NombrePersona.' '.$juez->ApellidoPaterno}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="input-group">
                    <label  for="apuntador" class="form-label">Apuntador:</label>
                    <div class="input-group col-md-12">
                      <select name="apuntador" class="form-select" id="apuntador" value={{ old('apuntador') }}>
                        @foreach ($jueces as $key => $juez)
                            <option value="{{$juez->IdJuez}}" >{{($key+1).'.-  '.$juez->NombrePersona.' '.$juez->ApellidoPaterno}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12 d-flex flex-row-reverse mt-4 ">
                    <div class="botones border border-secondary pt-2 pb-1 pe-2 ps-2">
                      <div class="d-inline p-2">
                        <button type="" class="btn prevSig">Anterior</button>
                      </div>
                      <div class="d-inline p-2">
                        <button type="submit" class="btn prevSig">Siguiente</button>
                      </div>
                    </div>
                    
                    
                    
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