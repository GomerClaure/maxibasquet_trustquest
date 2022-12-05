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