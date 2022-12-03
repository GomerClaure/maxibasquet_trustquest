<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/StyleLogin.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Inicio de sesion</title>
</head>
@extends('nav')
@section('content')
    <section class="login">
        <div class="row-1">
        </div>
        <div class="row t-5">
            <div class="col-2"></div>
            <div class="col seccionLogin">
                
                <svg class="icoLogin" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
                <h1 class="card-title">INICIAR SESION</h1>
                @if (Session::has('errorLogin'))
                    <div class="alert alert-danger alert-dismissible col-8 d-flex justify-content-center mt-3 mx-auto pt-2 pb-2">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <p>{{Session::get('errorLogin')}}</p>
                    </div>
                @endif
                    <form class="formularioLogin" action="{{url('/login')}}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="card login">
                            <div class="titulo">
                                <h5 class="">Campeonato Maxi Basquet</h5>
                            </div>
                            <div class="card-body">
                                <div class="input-group">
                                    <Label>Nombre de Usuario:</Label>
                                    <div class="input-group col-md-12">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                          </svg>
                                        </span>
                                        <input name="nombreDeUsuario" class="form-control"  type="text" value="{{ old('nombreDeUsuario') }}">
                                    </div>
                                    <div>
                                        @error('nombreDeUsuario')      
                                            <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="input-group">
                                    <Label>Contraseña:</Label>
                                    <div class="input-group col-md-12 ">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                            </svg>
                                        </span>
                                        <input name="contraseña" class="form-control" type="password" value="{{old('contraseña')}}">
                                    </div>
                                    <div>
                                        @error('contraseña')      
                                            <p class="error-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn iniciar-sesion">Iniciar Sesión</button>
                                </div>
                            </div>
                              
                        </div>
                    </form>
            </div>
            <div class="col-2"></div>
        </div>
        
        
    </section>
@endsection
</html>