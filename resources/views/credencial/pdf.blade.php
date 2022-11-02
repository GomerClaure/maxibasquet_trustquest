<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Credeenciales Equipo</title>
        <link  href="{{public_path('css/StylePdf.css')}}" rel="stylesheet" type="text/css">
        <link  href="{{public_path('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    
    </head>
    <body >
       
                <h2 class="text-center"> <b>{{$equipo->NombreEquipo}} -- Credenciales</b></h2>
                <h3>Categoria: {{$equipo->NombreCategoria}}</h3>                                                  
                <h2 > <strong>Jugadores</strong>  </h2> 
                @foreach ($credencialesJugadores as $jugador)            
                <div class="contenedorCredencial">
                    <div class="separador">                        
                    </div>
                     <div class="credencial">
                            <div >
                                <h5 class="credencialtitulo">Campeonato Maxi-Basquet</h5>
                            </div>
                                 
                                        <div >
                                            <img class="foto" src="{{public_path('storage'.'/'.$jugador->Foto)}}" alt="">
                                        </div>
                                        <div class="text-center"><h5><b>Jugador</b></h5></div>
                                        <div class="ms-2"> <p><b>Nombre: </b>{{$jugador->NombrePersona}} {{$jugador->ApellidoPaterno}}</p>
                                            <p><b>Equipo: </b> {{$equipo->NombreEquipo}}</p> 
                                            <p><b>Categoria: </b> {{$equipo->NombreCategoria}}</p> 
                                        </div>
                                     
                    </div>
                    <div class="credencialAtras" >
                            <h5 class="credencialtitulo">Campeonato Maxi-Basquet</h5>
                                 <div >
                                   <img class="qr" src="{{public_path('storage'.'/'.$jugador->CodigoQR)}}" alt="">
                                 </div>
                            <div class="text-center"><h5><b>Escanee el código QR para mayor información</b></h5></div>
                    </div> 
                </div>
                @endforeach     
                <div class="page-break"></div>                   
                <h2 > <strong>Técnicos</strong>  </h2> 
                @foreach ($credencialesTecnicos as $tecnico)            
                <div class="contenedorCredencial">
                    <div class="separador">                        
                    </div>
                     <div class="credencial">
                            <div >
                                <h5 class="credencialtitulo">Campeonato Maxi-Basquet</h5>
                            </div>
                                 
                                        <div >
                                            <img class="foto" src="{{public_path('storage'.'/'.$tecnico->Foto)}}" alt="">
                                        </div>
                                        <div class="text-center"><h5><b>{{$tecnico->RolesTecnicos}}</b></h5></div>
                                        <div class="ms-2"> <p><b>Nombre: </b>{{$tecnico->NombrePersona}} {{$tecnico->ApellidoPaterno}}</p>
                                            <p><b>Equipo: </b> {{$equipo->NombreEquipo}}</p> 
                                            <p><b>Categoria: </b> {{$equipo->NombreCategoria}}</p> 
                                        </div>
                                     
                    </div>
                    <div class="credencialAtras" >
                            <h5 class="credencialtitulo">Campeonato Maxi-Basquet</h5>
                                 <div >
                                   <img class="qr" src="{{public_path('storage'.'/'.$tecnico->CodigoQR)}}" alt="">
                                 </div>
                            <div class="text-center"><h5><b>Escanee el código QR para mayor información</b></h5></div>
                    </div> 
                </div>
                @endforeach                      
    </body>
</html>
