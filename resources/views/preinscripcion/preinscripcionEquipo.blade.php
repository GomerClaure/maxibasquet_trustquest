@extends('welcome')
@section('content')
<div class="container justify-content-center"">
        {{-- @section('scripts')
                <script src="/public/js/admin/users/preinscripcion.js"></script>
            @endsection --}}
		    <section class=" main-title text-center">
                <h1 class="display-6 mb-0" >Formulario de preinscripción de equipos</h1>
                <p>3er Torneo Internacional de Maxi Basquet</p>
            </section>
            <section class="form mx-5">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
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
                            <input name="nombreDeEquipo" type="text" class="form-control" id="nombreDeEquipo" value="{{ old('nombreDeEquipo') }}">
                            @error('nombreDeEquipo')
                                <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nombreDelEncargado" class="form-label">Nombre del encargado:</label>
                            <input name="nombreDelEncargado" type="text" class="form-control" id="nombreDelEncargado" value="{{ old('nombreDelEncargado') }}">
                            @error('nombreDelEncargado')
                                <p style="color:#FF0000" class="error-message">{{ $message }}</p>
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
                            @error('option[]')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="correoElectronico" class="form-label">Correo Electronico:</label>
                            <input name="correoElectronico" type="text" class="form-control" id="correoElectronico" value={{ old('correoElectronico') }}>
                            @error('correoElectronico')
                                <p style="color:#FF0000" class="error-message">{{ $message }}</p>
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
                                <input name="telefonoDeContacto" min="1"type="number" class="form-control" id="telefono" value={{ old('telefonoDeContacto') }}>
                                
                            </div>
                            @error('telefonoDeContacto')
                                <p style="color:#FF0000" class="error-message">{{ $message }}</p>
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
                            <input name="numeroDeComprobanteDePago" type="text" class="form-control" id="numeroDeComprobanteDePago" value="{{old("numeroDeComprobanteDePago")}}">
                            @error('numeroDeComprobanteDePago')
                                    <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="montoAPagar" class="form-label">Monto a pagar:</label>
                            <input name="montoAPagar" type="number" class="form-control" id="montoAPagar" value="{{old("montoAPagar")}}">
                            @error('montoAPagar')
                                    <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="numeroDeCuenta" class="form-label">Numero de cuenta:</label>
                            </div>
                            <div class="input-group">
                                <input name="numeroDeCuenta" type="number" class="form-control" id="numeroDeCuenta" value="{{old("numeroDeCuenta")}}">
                                
                            </div>
                            @error('numeroDeCuenta')
                                        <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="fechaDeDeposito" class="form-label">Fecha de depósito:</label>
                            <input name="fechaDeDeposito" type="date" class="form-control" id="fechaDeDeposito" min="2022-07-01" max="2023-01-04" value="{{old("fechaDeDeposito")}}">
                            @error('fechaDeDeposito')
                                    <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="vaucherDePago" class="form-label">Vaucher de Pago:</label>
                            </div>
                            <div class="input-group">
                                <input name="vaucherDePago" type="file" class="form-control" id="vaucherDePago" accept="image/*" aria-label="Upload" value="{{old("vaucherDePago")}}">
                            </div>
                            @error('vaucherDePago')
                                        <p  style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btnFomulario">Preinscribir Equipo</button>
                    </div>
               </form>
            </section>
            {{-- <section>
                <script src="{{asset('js/admin/users/preinscripcion.js')}}"></script>
            </section> --}}
 
        </div>
@endsection
