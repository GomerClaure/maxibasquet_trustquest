
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/StylePreinscripcion.css' )}}" rel="stylesheet">
    <title>Preinscripcion</title>
</head>
@extends('nav')
@section('content')
<div class="container justify-content-center"">
		    <section class=" main-title text-center">
                <h1 class="display-6 mb-0" >Formulario de preinscripción de equipos</h1>
                <p>3er Torneo Internacional de Maxi Basquet</p>
            </section>
            <section class="form mx-5">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error')  }}</div>
                @endif
                <form class="g-3" action="{{route('aplicacion')}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row pb-3 mb-4 registro-datos ">
                        <div class="card-title">
                            <h5>Datos del equipo</h5>

                        </div>
                        <hr>
                        <div class="col-md-6">
                            <label for="nombreDeEquipo" class="form-label">Nombre de equipo:</label>
                            <input name="{{config('constants.NOMBRE_EQUIPO')}}" type="text" class="form-control" id="nombreDeEquipo" value="{{ old(config('constants.NOMBRE_EQUIPO')) }}">
                            @error(config('constants.NOMBRE_EQUIPO'))
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nombreDelEncargado" class="form-label">Nombre del encargado:</label>
                            <input name="{{config('constants.NOMBRE_ENCARGADO')}}" type="text" class="form-control" id="nombreDelEncargado" value="{{ old(config('constants.NOMBRE_ENCARGADO')) }}">
                            @error(config('constants.NOMBRE_ENCARGADO'))
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="categorias" class="form-label">Categorias:</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input name="option[]" class="form-check-input" type="checkbox" id="categoria30" value="+30">
                                <label class="form-check-label" for="categoria30">+30</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="option[]" class="form-check-input" type="checkbox" id="categoria35" value="+35">
                                <label class="form-check-label" for="categoria35">+35</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="option[]" class="form-check-input" type="checkbox" id="categoria40" value="+40">
                                <label class="form-check-label" for="categoria40">+40</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="option[]" class="form-check-input" type="checkbox" id="categoria45" value="+45">
                                <label class="form-check-label" for="categoria45">+45</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="option[]" class="form-check-input" type="checkbox" id="categoria50" value="+50">
                                <label class="form-check-label" for="categoria50">+50</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="option[]" class="form-check-input" type="checkbox" id="categoria55" value="+55">
                                <label class="form-check-label" for="categoria55">+55</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="option[]" class="form-check-input" type="checkbox" id="categoria60" value="+60">
                                <label class="form-check-label" for="categoria60">+60</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="correoElectronico" class="form-label">Correo Electronico:</label>
                            <input name="{{config('constants.CORREO_ELECTRONICO')}}" type="text" class="form-control" id="correoElectronico" value={{ old(config('constants.CORREO_ELECTRONICO')) }}>
                            @error(config('constants.CORREO_ELECTRONICO'))
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  for="pais" class="form-label">Pais:</label>
                            <select name="pais" class="form-select" id="pais" value={{ old('pais') }}>
                            @foreach ($paises as $pais)
                                <option >{{$pais->NombrePais}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefonoDeContacto" class="form-label">Telefono de contacto:</label>
                            <div class="input-group">
                                <!-- <input disabled class="input-group-text p-0 " value="+591"> -->
                                <input name="{{config('constants.TELEFONO_CONTACTO')}}" min="1"type="number" class="form-control" id="telefono" value={{ old(config('constants.TELEFONO_CONTACTO')) }}>

                            </div>
                            @error(config('constants.TELEFONO_CONTACTO'))
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row pb-3 registro-datos" >
                        <div class="card-title">
                            <h5>Datos de pago</h5>
                        </div>
                        <hr>
                        <div class="col-md-6">
                            <label for="numeroDeComprobanteDePago" class="form-label">Numero de comprobante de pago:</label>
                            <input name="{{config('constants.DATOS_PAGO')}}" type="text" class="form-control" id="numeroDeComprobanteDePago" value="{{old(config('constants.DATOS_PAGO'))}}">
                            @error(config('constants.DATOS_PAGO'))
                                    <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="montoAPagar" class="form-label">Monto pagado:</label>
                            <input name="{{config('constants.MONTO_PAGAR')}}" type="number" class="form-control" id="montoAPagar" value="{{old(config('constants.MONTO_PAGAR'))}}">
                            @error(config('constants.MONTO_PAGAR'))
                                    <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="numeroDeCuenta" class="form-label">Numero de cuenta:</label>
                            </div>
                            <div class="input-group">
                                <input name="{{config('constants.NUM_CUENTA')}}" type="number" class="form-control" id="numeroDeCuenta" value="{{old(config('constants.NUM_CUENTA'))}}">

                            </div>
                            @error(config('constants.NUM_CUENTA'))
                                        <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="fechaDeDeposito" class="form-label">Fecha de depósito:</label>
                            <input name="{{config('constants.FEC_DEPOSITO')}}" type="date" class="form-control" id="fechaDeDeposito" min="2022-07-01" max="2023-01-04" value="{{old(config('constants.FEC_DEPOSITO'))}}">
                            @error(config('constants.FEC_DEPOSITO'))
                                    <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="vaucherDePago" class="form-label">Vaucher de Pago:</label>
                            </div>
                            <div class="input-group">
                                <input name="{{config('constants.VAUCHER_PAGO')}}" type="file" class="form-control" id="vaucherDePago" accept="image/*" aria-label="Upload" value="{{old(config('constants.VAUCHER_PAGO'))}}">
                            </div>
                            @error(config('constants.VAUCHER_PAGO'))
                                        <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn botonPreinscripcion">Preinscribir Equipo</button>
                    </div>
               </form>
            </section>
            {{-- <section>
                <script src="{{asset('js/admin/users/preinscripcion.js')}}"></script>
            </section> --}}

        </div>
 
@endsection
</html>