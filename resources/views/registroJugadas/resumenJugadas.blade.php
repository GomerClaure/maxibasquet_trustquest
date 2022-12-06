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
        <h1 for="">Resumen de Jugadas</h1>
        <div class="row">
            <section class="resumenPartido p-3">
                <div class="row pb-3 border-bottom border-dark">
                    {{-- <div>
                        <label  for="anotadorAsistente" class="form-labe tituloPuntaje">Puntaje Final:</label>
                    </div> --}}
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label  for="anotadorAsistente" class="form-labe tituloPuntajeEquipoA">Cronometrista:</label>
                            </div>
                            <div class="input-group col">
                                <input class="form-control cuartos" type="text" value="{{$jueces[0]->NombrePersona.' '.$jueces[0]->ApellidoPaterno }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label  for="anotadorAsistente" class="form-labe tituloPuntajeEquipoA">Apuntador:</label>
                            </div>
                            <div class="input-group col">
                                <input class="form-control cuartos" type="text" value="{{$jueces[1]->NombrePersona.' '.$jueces[1]->ApellidoPaterno }}"   disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 border-bottom border-dark">
                        <div>
                            <label  for="anotadorAsistente" class="form-labe tituloPuntaje">Puntaje por periodo:</label>
                        </div>
                        <div class="col  border-end border-dark">
                            <div>
                                <label  for="anotadorAsistente" class="form-labe tituloPuntajeEquipoA">Equipo A:</label>
                            </div>
                            <div class="row  ps-4 pe-3 ">
                                <div class="mb-2 row ">
                                    <div class="col text-center">
                                        <label  for="anotadorAsistente" class="form-label">1er cuarto:</label>
                                    </div>
                                    <div class="input-group col">
                                        <input class="form-control cuartos" type="text" value="{{$jugadasEquipoA[0]}}"  disabled>
                                    </div>
                                    
                                </div>
                                <div class="mb-2 row ">
                                    <div class="col text-center">
                                        <label  for="anotadorAsistente" class="form-label">2do cuarto:</label>
                                    </div>
                                    <div class="input-group col">
                                        <input class="form-control cuartos" type="text" value="{{$jugadasEquipoA[1]}}"  disabled>
                                    </div>
                                    
                                </div>
                                <div class="mb-2 row ">
                                    <div class="col text-center">
                                        <label  for="anotadorAsistente" class="form-label">3er cuarto:</label>
                                    </div>
                                    <div class="input-group col">
                                        <input class="form-control cuartos" type="text" value="{{$jugadasEquipoA[2]}}"  disabled>
                                    </div>
                                    
                                </div>
                                <div class="mb-2 row ">
                                    <div class="col text-center">
                                        <label  for="anotadorAsistente" class="form-label">4to cuarto:</label>
                                    </div>
                                    <div class="input-group col">
                                        <input class="form-control cuartos" type="text" value="{{$jugadasEquipoA[3]}}"  disabled>
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </div>
                        <div class="col">
                            <div>
                                <label class="form-label tituloPuntajeEquipoB">Equipo B:</label>
                            </div>
                            <div class="row  ps-4 pe-3 ">
                                <div class="mb-2 row ">
                                    <div class="col text-center">
                                        <label  for="anotadorAsistente" class="form-label">1er cuarto:</label>
                                    </div>
                                    <div class="input-group col">
                                        <input class="form-control cuartos" type="text" value="{{$jugadasEquipoB[0]}}"  disabled>
                                    </div>
                                    
                                </div>
                                <div class="mb-2 row ">
                                    <div class="col text-center">
                                        <label  for="anotadorAsistente" class="form-label">2do cuarto:</label>
                                    </div>
                                    <div class="input-group col">
                                        <input class="form-control cuartos" type="text" value="{{$jugadasEquipoB[1]}}"  disabled>
                                    </div>
                                    
                                </div>
                                <div class="mb-2 row ">
                                    <div class="col text-center">
                                        <label  for="anotadorAsistente" class="form-label">3er cuarto:</label>
                                    </div>
                                    <div class="input-group col">
                                        <input class="form-control cuartos" type="text" value="{{$jugadasEquipoB[2]}}"  disabled>
                                    </div>
                                    
                                </div>
                                <div class="mb-2 row ">
                                    <div class="col text-center">
                                        <label  for="anotadorAsistente" class="form-label">4to cuarto:</label>
                                    </div>
                                    <div class="input-group col">
                                        <input class="form-control cuartos" type="text" value="{{$jugadasEquipoB[3]}}"  disabled>
                                    </div>
                                    
                                </div>
                            </div>  
                        </div>
                    
                </div>
                <div class="row pb-3 pt-3 border-bottom border-dark">
                    <div>
                        <label  for="anotadorAsistente" class="form-labe tituloPuntaje">Puntaje Final:</label>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label  for="anotadorAsistente" class="form-labe tituloPuntajeEquipoA">Equipo A:</label>
                            </div>
                            <div class="input-group col">
                                <input class="form-control cuartos" type="text" value="{{$totalA}}"  disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <label  for="anotadorAsistente" class="form-labe tituloPuntajeEquipoA">Equipo B:</label>
                            </div>
                            <div class="input-group col">
                                <input class="form-control cuartos" type="text" value="{{$totalB}}"  disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-3 pt-3">
                    <div class="col">
                        <label  for="anotadorAsistente" class="form-labe tituloPuntajeEquipoA">Equipo Vencedor:</label>
                        <label  for="anotadorAsistente" class="form-labe tituloPuntajeEquipoA">Equipo {{$ganador->Equipo}}</label>
                    </div>
                    <div class="input-group col">
                        <input class="form-control cuartos" type="text" value="{{$ganador->NombreEquipo}}"  disabled>
                    </div>
                </div>
                
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
                <div class="row pb-3">
                    <div class="text-center">
                        <a href="{{url('/home')}}" class="btn iniciarPartido">Salir del resumen</a>
                    </div>
                    
                </div>
                
            </section>
        </div>
       
      </div>
      <div class="col-1"></div>
  </div>
  
  
</section>
<script>
    var posA = 0;
    var posB = 0;
    var jugadas = {!!$jugadas!!}
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
</script>
</body>
</html>