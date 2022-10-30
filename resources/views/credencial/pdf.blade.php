<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Credeenciales Equipo</title>
        <link  href="{{public_path('css/StyleCredenciales.css')}}" rel="stylesheet" type="text/css">
        <link  href="{{public_path('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    
    </head>
    <body class="antialiased">
        <div class="">
                <div class="" >
                    <div class="">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                
                                <h2 class="text-center"> <b>{{$equipo->NombreEquipo}} -- Credenciales</b></h2>
                                <h3>Categoria: {{$equipo->NombreCategoria}}</h3>
                                <div class="card ">
                                    <div class="card-header">
                                        <h4 class=" card-title"><b>Lista de Credenciales</b> </h4>
                                    </div>
                                        <div class="card-body ">
                                                    <h2 >
                                                        <strong>Jugadores</strong> 
                                                    </h2>                                                        
                                                            <div class="row justify-content-center">
                                                            @foreach ($credencialesJugadores as $jugador)
                                                            <div class="col-4 p-0 mb-3">
                                                                <div class="card h-100 " >
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">Campeonato Maxi-Basquet</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                                
                                                                                <div class="text-center"><h5><b>Jugador</b></h5></div>
                                                                                <div>
                                                                                    <p><b>Nombre: </b>{{$jugador->NombrePersona}} {{$jugador->ApellidoPaterno}}</p>
                                                                                </div>
                                                                                <div><p><b>Equipo: </b> {{$equipo->NombreEquipo}}</p> </div>
                                                                                <div><p><b>Categoria: </b> {{$equipo->NombreCategoria}}</p> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4 p-0 me-2 mb-3 " >
                                                                <div class="card  h-100 credencial ">
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">Campeonato Maxi-Basquet</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                              
                                                                                <div class="text-center"><h5><b>Escanee el código QR para mayor información</b></h5></div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            @endforeach   
                                                            </div>  
                                                        
                                                    
                                                
                                                
                                               
                                                    <h2 >
                                                        <b>Técnicos</b> 
                                                        
                                                    </h2>
                                                        
                                                            
                                                            <div class="row justify-content-center">
                                                            @foreach ($credencialesTecnicos as $tecnico)
                                                            <div class="col-4 p-0 mb-3">
                                                                <div class="card h-100 " >
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">Campeonato Maxi-Basquet</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                                <div class="d-flex justify-content-center">
                                                                                    <img class="card-img-top foto img-fluid" src="{{public_path('storage'.'/'.$tecnico->Foto)}}" alt="">
                                                                                </div>
                                                                                <div class="text-center"><h5><b>{{$tecnico->RolesTecnicos}}</b></h5></div>
                                                                                <div>
                                                                                    <p><b>Nombre: </b>{{$tecnico->NombrePersona}} {{$tecnico->ApellidoPaterno}}</p>
                                                                                </div>
                                                                                <div><p><b>Equipo: </b> {{$equipo->NombreEquipo}}</p> </div>
                                                                                <div><p><b>Categoria: </b> {{$equipo->NombreCategoria}}</p> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4 p-0 me-2 mb-3 " >
                                                                <div class="card  h-100 credencial ">
                                                                        <div class="card-header">
                                                                            <h5 class="card-title">Campeonato Maxi-Basquet</h5>
                                                                        </div>
                                                                        <div class="card-body">
                                                                                <div class="d-flex justify-content-center foto">
                                                                                    <img class="  " src="{{public_path('storage'.'/'.$tecnico->CodigoQR)}}" alt="">
                                                                                </div>
                                                                                <div class="text-center"><h5><b>Escanee el código QR para mayor información</b></h5></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                
                                                            @endforeach   
                                                            </div>
                                                        
                                                    
                                                
                                                   
                                                
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
