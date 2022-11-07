<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/StyleLogin.css')}}">
    <title>Inicio de sesion</title>
</head>
@extends('nav')
@section('content')
    <section class="login">
        <div class="row-1">
        </div>
        <div class="row t-5">
            <div class="col-3"></div>
            <div class="col">
                    <form action="">
                        <div class="card login">
                        
                            <div class="card-body">
                            
                                <h5 class="card-title">INICIO DE SESION</h5>
                                <div class="input-group">
                                    <Label>Nombre de Usuario:</Label>
                                    <div class="input-group col-md-12">
                                        <span class="input-group-text" id="basic-addon1">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                          </svg>
                                        </span>
                                        <input class="form-control"  type="text">
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
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn iniciar-sesion">Iniciar Sesión</button>
                                </div>
                            </div>
                              
                        </div>
                    </form>
            </div>
            <div class="col-3"></div>
        </div>
        
        
    </section>
@endsection
</html>