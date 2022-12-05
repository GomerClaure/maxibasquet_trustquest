
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fixtur</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
       @extends('nav')
       @section('content')
    </head>
    <body class="antialiased">
    <header >
            <!-- Grey with black text -->
           
        </header>
        <div class="relative  items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0 ">
        <div class="bg-image w-100" >
                    <div class="mask d-flex align-items-center w-100">
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-12">
                                <h3 class="color">Fixture </h3>
                                <h5 class="color">3er Torneo Internacional de Maxi Basquet</h5>
                            <div class="card">
                            
                            <div class="card-body  pt-0 ps-3 ">
                                <div class="table-responsive table-scroll rounded-0" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                                <table class="table table-striped table-borderless border-dark  mb-0 text-center align-middle">
                                    <thead>
                                    <tr>
                                        <th>Partidos </th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i=0;$i<sizeof($nombres);$i=$i+2)
                                        <tr>
                                            @if($i+1!=sizeof($nombres))
                                                
                                                <td >
                                                <div class="card1 ancho ">
                                                    <div class="card-header">
                                                        <h5 class="card-header">
                                                        {{$nombres[$i]->NombreEquipo}}
                                                            VS 
                                                        {{$nombres[$i+1]->NombreEquipo}}
                                                        </h5>
                                                    </div>
                                                    <div class="card-body cuadricula">
                                                        <div class="linea">
                                                             Fecha:{{$fechas[$i]->FechaPartido}}
                                                        </div> 
                                                        <div class="linea">
                                                             Lugar:{{$lugares[$i]->LugarPartido}}
                                                        </div>
                                                        <div class="linea">
                                                            Hora:{{$horas[$i]->HoraPartido}}
                                                        </div>   
                                                        <div class="linea">
                                                            Estado:{{$estados[$i]->EstadoPartido}}
                                                        </div>   
                                                        <div class="linea">
                                                            Categoria:{{$categorias[$i]->NombreCategoria}}
                                                        </div>   
                                                        
                                                    </div>
                                                </div>
                                                </td>
                                                
                                                
                                            @endif
                                            
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                        <div class="centro"><button class="btn">Atras</button></div>

                                </div>
                              

                            </div>
        </div>
        @endsection

     </body>
     
     
</html>