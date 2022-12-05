<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registro Jugadas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/styleRegistroJugadas.css')}}"></head>

{{-- @extends('nav') --}}
<body>
    
<div class="container">
  
</div>
<section class="registroFormulario">
  <div class="row-1">
  </div>
  <div class="row t-5">
      <div class="col-1"></div>
      <div class="col pasos">
        <h1 for="">Planilla De Jugadas</h1>
        <div class="row">
            <section class="datosPartido">
                <div class="col p-3 ">
                    <a href="{{url('planilla/jugador/')}}" class="btn iniciarPartido">Volver</a>
                </div>
                <div class="border-bottom border-dark">
                    <div class="row p-2">
                        <div class="col">
                            <div class="input-group">
                                <label  for="equipoB" class="form-label">Equipo A:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$equipoA->NombreEquipo}}"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <label  for="equipoA" class="form-label">Equipo B:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$equipoB->NombreEquipo}}"  disabled>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <label  for="categoria" class="form-label">Categoria:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$categoria->NombreCategoria}}"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <label  for="nroDeJuego" class="form-label">Nro de Juego:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$idPartido}}"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <label  for="fecha" class="form-label">Fecha:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$fechaHoy}}"  disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col">
                            <div class="input-group">
                                <label  for="lugar" class="form-label">Lugar:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$partido->LugarPartido}}"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <label  for="juez1" class="form-label">1er Juez:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$jueces[0]->NombrePersona.' '.$jueces[0]->ApellidoPaterno }}"  disabled>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <label  for="juez2" class="form-label">2do Juez:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$jueces[1]->NombrePersona.' '.$jueces[1]->ApellidoPaterno }}"  disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center  p-3">
                        <button name="accionBoton" class="btn iniciarPartido" id="iniciarPartido" value="IniciarPartido" > Iniciar partido</button>
                    </div>
                </div>
            </section>
            <section class="registroPuntaje border-bottom" id="registroPuntaje" style="display: none">
                <form class="formularioJugada" action="{{route('guardarJugada',['idPartido' => $idPartido])}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row p-2 pt-4 pb-4">
                            <div class="col">
                                <div class="input-group">
                                    <label  for="puntoEquipo" class="form-label">Punto para el equipo:</label>
                                    <select name="puntoEquipo" class="form-select" id="puntoEquipo" onChange="update()" value={{ old('puntoEquipo') }}>
                                        <option id="eqA" value="{{'A '.$equipoA->IdEquipo}}">{{$equipoA->NombreEquipo}}</option>
                                        <option id="eqB" value="{{'B '.$equipoB->IdEquipo}}">{{$equipoB->NombreEquipo}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <label  for="puntacion" class="form-label">Puntuacion:</label>
                                    <select name="puntacion" class="form-select" id="puntacion" value={{ old('puntacion') }}>
                                        <option value="1">1 Punto</option>
                                        <option value="2">2 Puntos </option>
                                        <option value="3">3 Puntos</option>
                                    </select>
                                </div> 
                                
                            </div>
                            <div class="col ">
                                <div class="input-group">
                                    <label  for="jugador" class="form-label">Jugador:</label>

                                    <select name="jugadorA" class="form-select" id="jugadorA" style="display: block" value={{ old('jugadorA')}} >
                                    @foreach ($jugadoresA as $jugadorA)
                                        <option value="{{$jugadorA->IdJugador}}">{{$jugadorA->NombrePersona.' '.$jugadorA->ApellidoPaterno}}</option>
                                    @endforeach
                                    </select>
                                    <select name="jugadorB" class="form-select" id="jugadorB" style="display: none" value={{ old('jugadorB')}} >
                                    @foreach ($jugadoresB as $jugadorB)
                                        <option value="{{$jugadorB->IdJugador}}">{{$jugadorB->NombrePersona.' '.$jugadorB->ApellidoPaterno}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="row p-2 pt-4 pb-4">
                        <div class="col text-center">
                            <div class="d-inline p-2">
                                <button name="accionBoton" type="submit" class="btn guardarP" value="GuardarPunto"> Guardar Punto</button>
                            </div>
                            <div class="d-inline p-2">
                                <button name="accionBoton" type="submit" class="btn guardarP" value="FinalizarCuarto" > Finalizar Cuarto</button>
                            </div>
                        </div>
                </div>
                </form>
            </section>
            <section class="mostrarResultado mb-5">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered border-secondary table-sm">
                            <tr>
                             <th colspan="2">A</th>
                             <th colspan="2">B</th>
                            </tr>
                            @foreach($registroTabla1 as $registro)
                                <tr>
                                    <td id="{{'colA'.$registro}}">&nbsp;</td>
                                    <td>{{$registro}}</td>
                                    <td>{{$registro}}</td>
                                    <td id="{{'colB'.$registro}}">&nbsp;</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col">
                        <table class="table table-bordered border-secondary table-sm">
                            <tr>
                             <th colspan="2">A</th>
                             <th colspan="2">B</th>
                            </tr>
                            @foreach($registroTabla2 as $registro)
                                <tr>
                                    <td id="{{'colA'.$registro}}">&nbsp;</td>
                                    <td>{{$registro}}</td>
                                    <td>{{$registro}}</td>
                                    <td id="{{'colB'.$registro}}">&nbsp;</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col">
                        <table class="table table-bordered border-secondary table-sm">
                            <tr>
                             <th colspan="2">A</th>
                             <th colspan="2">B</th>
                            </tr>
                            @foreach($registroTabla3 as $registro)
                                <tr>
                                    <td id="{{'colA'.$registro}}">&nbsp;</td>
                                    <td>{{$registro}}</td>
                                    <td>{{$registro}}</td>
                                    <td id="{{'colB'.$registro}}">&nbsp;</td>
                                </tr>
                            @endforeach 
                        </table>
                    </div>
                    <div class="col">
                        <table class="table table-bordered border-secondary table-sm">
                            <tr>
                             <th colspan="2">A</th>
                             <th colspan="2">B</th>
                            </tr>
                            @foreach($registroTabla4 as $registro)
                                <tr>
                                    <td id="{{'colA'.$registro}}">&nbsp;</td>
                                    <td>{{$registro}}</td>
                                    <td>{{$registro}}</td>
                                    <td id="{{'colB'.$registro}}">&nbsp;</td>
                                </tr>
                            @endforeach 
                        </table>
                    </div>
                    
                </div>
                
            </section>
            <section class="resumen">

            </section>
        </div>
       
      </div>
      <div class="col-1"></div>
  </div>
  
  
</section>
<script>
    var cuarto = {{$cuarto}}
    console.log(cuarto);
    var posA = 0;
    var posB = 0;
    var jugadas = {!!$jugadas!!}

    console.log(cuarto);
    console.log(jugadas);

    jugadas.forEach(jugada => {
        console.log("a");
        if(jugada["Equipo"] == "A"){
            var posDestino = (posA+jugada["TipoJugada"]);
            while(posA < posDestino){
                posA++;
                var colA = document.getElementById("colA"+posA);
                if (posA == posDestino) {
                    colA.innerHTML =jugada["NumeroCamiseta"];
                }
                if(jugada["CuartoJugada"]==1 || jugada["CuartoJugada"]==3){
                    colA.style.borderColor = "red";
                    colA.style.background ="#FFA07A";
                }
                if(jugada["CuartoJugada"]==2 || jugada["CuartoJugada"]==4){
                    colA.style.borderColor = "#1F618D";
                    colA.style.background ="#7FB3D5";
                }
            }
        }else{
            var posDestino = (posB+jugada["TipoJugada"]);
            while(posB < posDestino){
                posB++;
                var colB = document.getElementById("colB"+posB);
                if (posB == posDestino) {
                    colB.innerHTML =jugada["NumeroCamiseta"];
                }
                if(jugada["CuartoJugada"]==1 || jugada["CuartoJugada"]==3){
                    colB.style.borderColor = "red";
                    colB.style.background ="#FFA07A";
                }
                if(jugada["CuartoJugada"]==2 || jugada["CuartoJugada"]==4){
                    colB.style.borderColor = "#1F618D";
                    colB.style.background ="#7FB3D5";
                }
            }
            
        }
        
    });
    if(cuarto != 0){
            document.getElementById("registroPuntaje").style.display = "block";
            document.getElementById("iniciarPartido").style.display = "none";
    }else{
        document.getElementById("iniciarPartido").onclick = function() {
            document.getElementById("registroPuntaje").style.display = "block";
            document.getElementById("iniciarPartido").style.display = "none";
        }
    }
    // function show() {

    // }

    function update() {
				var select = document.getElementById('puntoEquipo');
				var option = select.options[select.selectedIndex];
                if (option.id == "eqA") {
                    document.getElementById("jugadorB").style.display = "none";
                    document.getElementById("jugadorA").style.display = "block";
                }
                if (option.id == "eqB") {
                    document.getElementById("jugadorA").style.display = "none";
                    document.getElementById("jugadorB").style.display = "block";
                }
			}

	update();

</script>
</body>
</html>