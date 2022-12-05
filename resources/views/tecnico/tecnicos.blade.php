<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Cuerpo Técnico</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/StyleListaTecnicos.css')}}">
    </head>
    <body class="antialiased bodyJ">
    @extends('nav') 
    @section('content')
        <div class="relative  items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0 ">
                <div class="bg-image w-100" >
                    <div class="mask d-flex align-items-center w-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                
                                
                                <h2 class="text-center"> <b>Liga Maxi Basquet -- Técnicos</b></h2>
                                
                                <div class="card fondoTabla cardJ">
                                    <div class="card-header ps-3 py-2 d-flex justify-content-between">
                                        <h4 class="text-black card-title"><b>Integrantes</b> </h4> 
                                
                                    </div>
                                        <div class="card-body  pt-0 ps-3 text-center card-bodyJ">
                                            @if(!$tecnicos->isEmpty())
                                            @foreach ($tecnicos as $tecnico)
                                                <div class="card d-inline-block m-3 cardJ" style="width: 19rem;">
                                        
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-center">
                                                        <img class="card-img-top img-fluid card-img-topJ" src="{{asset('storage').'/'.$tecnico->Foto}}" alt="">
                                                        </div>
                                                    
                                                        <h4>{{$tecnico->NombrePersona}} </h4>
                                                        <h5>{{$tecnico->ApellidoPaterno}} {{$tecnico->ApellidoMaterno}}</h5>
                                                        <a href="{{url('tecnico'.'/'.$tecnico->IdTecnicos)}}" class="btn btn-primary btnj displayBotonJ ">Detalles</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @else
                                            <div class="d-flex justify-content-center">
                                                 <h3>No se encontro personal tecnico registrado</h3>
                                            </div>
                                            
                                            @endif
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</html>
