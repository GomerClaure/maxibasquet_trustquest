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
        <h1 for="">Planilla de Jugadas</h1>
        <div class="row">
            <section class="datosPartido">
                <div class="col p-3 pb-1 pt-1 border-bottom border-dark border-opacity-50">
                    <a href="{{url('planilla/jugador/')}}" class="btn iniciarPartido">Volver</a>
                </div>
                <div class="border-bottom border-dark border-opacity-50">
                    <div class="row p-2">
                        {{-- <div class="col-1"></div> --}}
                        <div class="col-md-2">
                            <div class="input-group">
                                <label  for="categoria" class="form-label">Categoria:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$categoria->NombreCategoria}}"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label  for="nroDeJuego" class="form-label">Nro de Juego:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$idPartido}}"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label  for="fecha" class="form-label">Fecha:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$fechaHoy}}"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label  for="lugar" class="form-label">Lugar:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$partido->LugarPartido}}"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label  for="juez1" class="form-label">1er Juez:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$jueces[0]->NombrePersona.' '.$jueces[0]->ApellidoPaterno }}"  disabled>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                                <label  for="juez2" class="form-label">2do Juez:</label>
                                <div class="input-group col-md-12">
                                    <input class="form-control" type="text" value="{{$jueces[1]->NombrePersona.' '.$jueces[1]->ApellidoPaterno }}"  disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        <form class="formularioJugada" action="{{route('guardarJugada',['idPartido' => $idPartido])}}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="col text-center  p-2">
                                <button name="accionBoton" class="btn iniciarPartido" id="iniciarPartido" type="submit" value="IniciarPartido" > Iniciar partido</button>
                            </div>
                        </form>                        
                </div>
            </section>
            <section class="registroPuntaje border-bottom" id="registroPuntaje" style="display: none">
                <form class="formularioJugada" action="{{route('guardarJugada',['idPartido' => $idPartido])}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row p-2 pt-2 pb-3">
                        <div>
                            <label  for="puntoEquipo" class="form-label">Registro de jugadas:</label>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="input-group">
                                    <label  for="equipoB" class="form-label">Equipo A:</label>
                                    <div class="input-group col-md-12">
                                        <input class="form-control" type="text" value="{{$equipoA->NombreEquipo}}"  disabled>
                                    </div>
                                </div>
                               <div class="container mt-2">
                                    <div class="row  border border-dark border-opacity-25 text-center">
                                        <div class="col-4 border-end">
                                            <label value="1">Jugadores</label>
                                        </div>
                                        <div class="col ">
                                            <label value="2">Puntos</label>
                                        </div>
                                    </div>
                                    @foreach ($jugadoresA as $jugadorA)
                                        <div class="row  border border-dark border-opacity-25 text-center">
                                            <div class="col-4 border-end">
                                                <label value="{{$jugadorA->IdJugador}}">{{$jugadorA->NombrePersona.' '.$jugadorA->ApellidoPaterno}}</label>
                                            </div>
                                            <div class="col ">
                                                    <button name="GuardarPunto" type="submit" id="1p" class="btn guardarP m-2" value="{{'A '.$equipoA->IdEquipo.' '.$jugadorA->IdJugador.' 1'}}">1 Punto</button>
                                                    <button name="GuardarPunto" type="submit" id="2p" class="btn guardarP m-2" value="{{'A '.$equipoA->IdEquipo.' '.$jugadorA->IdJugador.' 2'}}">2 Puntos</button>
                                                    <button name="GuardarPunto" type="submit" id="3p" class="btn guardarP m-2" value="{{'A '.$equipoA->IdEquipo.' '.$jugadorA->IdJugador.' 3'}}">3 Puntos</button>
                                            </div>
                                        </div>
                                    @endforeach 
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
                            <div class="container mt-2">
                                <div class="row  border border-dark border-opacity-25 text-center">
                                    <div class="col-4 border-end">
                                        <label value="1">Jugadores</label>
                                    </div>
                                    <div class="col ">
                                        <label value="2">Puntos</label>
                                    </div>
                                </div>
                                @foreach ($jugadoresB as $jugadorB)
                                    <div class="row  border border-dark border-opacity-25 text-center">
                                        <div class="col-4 border-end">
                                            <label value="{{$jugadorB->IdJugador}}">{{$jugadorB->NombrePersona.' '.$jugadorB->ApellidoPaterno}}</label>
                                        </div>
                                        <div class="col ">
                                                <button name="GuardarPunto" type="submit" class="btn guardarP m-2" value="{{'B '.$equipoB->IdEquipo.' '.$jugadorB->IdJugador.' 1'}}">1 Punto</button>
                                                <button name="GuardarPunto" type="submit" class="btn guardarP m-2" value="{{'B '.$equipoB->IdEquipo.' '.$jugadorB->IdJugador.' 2'}}">2 Puntos</button>
                                                <button name="GuardarPunto" type="submit" class="btn guardarP m-2" value="{{'B '.$equipoB->IdEquipo.' '.$jugadorB->IdJugador.' 3'}}">3 Puntos</button>
                                        </div>
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                    <div class="row p-2 p2 pb-4">
                        <div class="col text-center">
                            <div class="d-inline p-2">
                                <button name="accionBoton" type="submit" class="btn guardarP" value="FinalizarCuarto" > Finalizar Cuarto</button>
                            </div>
                        </div>
                </div>
                </form>
            </section>
           
            <section class="resumen">

            </section>
        </div>
       
      </div>
      <div class="col-1"></div>
  </div>
  
  
</section>
<section class="mostrarResultado mb-5" style="max-width:100%;">
    <div class="container">
        <div class="row mb-2 mt-2" style="overflow-x: auto;">
            <table class="table table-bordered border-secondary table-sm ms-2">
                <tr>
                    <th rowspan="2">A</th>
                    @foreach($registroTabla1 as $registro)
                        <td id="{{'colA'.$registro}}">&nbsp;</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($registroTabla1 as $registro)
                        <td>{{$registro}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th rowspan="2">B</th>
                    @foreach($registroTabla1 as $registro)
                    <td>{{$registro}}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($registroTabla1 as $registro)
                        <td id="{{'colB'.$registro}}">&nbsp;</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <div class="row mb-2 mt-2" style="overflow-x: auto;">
            <table class="table table-bordered border-secondary table-sm ms-2">
                <tr>
                    <th rowspan="2">A</th>
                    @foreach($registroTabla2 as $registro)
                        <td id="{{'colA'.$registro}}">&nbsp;</td>
                            
                    @endforeach
                </tr>
                <tr>
                    @foreach($registroTabla2 as $registro)
                        <td>{{$registro}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th rowspan="2">B</th>
                    @foreach($registroTabla2 as $registro)
                    <td>{{$registro}}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($registroTabla2 as $registro)
                        <td id="{{'colB'.$registro}}">&nbsp;</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <div class="row mb-2 mt-2" style="overflow-x: auto;">
            <table class="table table-bordered border-secondary table-sm ms-2">
                <tr>
                    <th rowspan="2">A</th>
                    @foreach($registroTabla3 as $registro)
                        <td id="{{'colA'.$registro}}">&nbsp;</td>
                            
                    @endforeach
                </tr>
                <tr>
                    @foreach($registroTabla3 as $registro)
                        <td>{{$registro}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th rowspan="2">B</th>
                    @foreach($registroTabla3 as $registro)
                    <td>{{$registro}}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($registroTabla3 as $registro)
                        <td id="{{'colB'.$registro}}">&nbsp;</td>
                    @endforeach
                </tr>
            </table>
        </div>
        <div class="row mb-2 mt-2" style="overflow-x: auto;">
            <table class="table table-bordered border-secondary table-sm ms-2">
                <tr>
                    <th rowspan="2">A</th>
                    @foreach($registroTabla4 as $registro)
                        <td id="{{'colA'.$registro}}">&nbsp;</td>
                            
                    @endforeach
                </tr>
                <tr>
                    @foreach($registroTabla4 as $registro)
                        <td>{{$registro}}</td>
                    @endforeach
                </tr>
                <tr>
                    <th rowspan="2">B</th>
                    @foreach($registroTabla4 as $registro)
                    <td>{{$registro}}</td>
                    @endforeach
                </tr>
                <tr>
                    @foreach($registroTabla4 as $registro)
                        <td id="{{'colB'.$registro}}">&nbsp;</td>
                    @endforeach
                </tr>
            </table>
        </div>
    
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
    }

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