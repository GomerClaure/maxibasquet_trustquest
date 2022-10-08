<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <link href="{{asset('css/StylePreinscripcion.css' )}}" rel="stylesheet">
    <title>Preinscripcion</title>
</head>

<body>
    <div >
        <div class="container justify-content-center"">
        {{-- @section('scripts')
                <script src="/public/js/admin/users/preinscripcion.js"></script>
            @endsection --}}
		    <section class=" main-title text-center">
                <h1 class="display-6 mb-0" >Formulario de preinscripción de equipos</h1>
                <p>3er Torneo Internacional de Maxi Basquet</p>
            </section>
            <section class="form mx-5">
                <form class="g-3" action="{{route('aplicacion')}}" method="POST" enctype="multipart/form-data">
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
                            <input name="nombreDelEncargado" type="text" class="form-control" id="nombreDelEncargado">
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
                            <label for="correo" class="form-label">Correo Electronico:</label>
                            <input name="correo" type="email" class="form-control" id="correo">
                            @error('correo')
                                <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label  for="pais" class="form-label">Pais:</label>
                            <select name="pais" class="form-select" id="pais">
                            @foreach ($paises as $pais)
                                <option >{{$pais->NombrePais}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Telefono de contacto:</label>
                            <div class="input-group">
                                <!-- <input disabled class="input-group-text p-0 " value="+591"> -->
                                <input name="telefono" min="1"type="number" class="form-control" id="telefono">
                                
                            </div>
                            @error('telefono')
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
                            <label for="numComprobante" class="form-label">Numero de comprobante de pago:</label>
                            <input name="numComprobante" type="text" class="form-control" id="numComprobante">
                            @error('numComprobante')
                                    <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="montoPagar" class="form-label">Monto a pagar:</label>
                            <input name="montoPagar" type="number" class="form-control" id="montoPagar">
                            @error('montoPagar')
                                    <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="numCuenta" class="form-label">Numero de cuenta:</label>
                            </div>
                            <div class="input-group">
                                <input name="numCuenta" type="number" class="form-control" id="numCuenta" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                
                            </div>
                            @error('numCuenta')
                                        <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="fecDeposito" class="form-label">Fecha de depósito:</label>
                            <input name="fecDeposito" type="date" class="form-control" id="fecDeposito">
                            @error('fecDeposito')
                                    <p style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="vaucher" class="form-label">Voucher de Pago:</label>
                            </div>
                            <div class="input-group">
                                <input name="vaucher" type="file" class="form-control" id="vaucher" accept="image/*" aria-label="Upload">
                            </div>
                            @error('vaucher')
                                        <p  style="color:#FF0000" class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn " style="background: #F7B32B">Preinscribir Equipo</button>
                    </div>
               </form>
            </section>
            <section>
                <script src="{{asset('js/admin/users/preinscripcion.js')}}"></script>
            </section>
            {{-- @section('scripts')
                
            @endsection --}}
        </div>
    </div>
</body>

</html>