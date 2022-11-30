<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mi Equipo</title>
    <link rel="stylesheet" href="{{asset('css/StyleSubirLogo.css' )}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>
@extends('nav') 
@section('content')
<br>
<div class="container justify-content-center">
<section class=" main-title ">
    <h1 class="display-6 mb-0" >Mi Equipo</h1>
    <p>3er Torneo Internacional de Maxi Basquet</p>
</section>
<section class="form mx-5">
    <form action="{{route('subirLogo', ['idEquipo' => $equipo->IdEquipo])}}" method="post" enctype="multipart/form-data" id="form">
        @csrf
    <div class="row">
        <div class="col-md-6 nombreEquipo">
            <label for="nombreDeEquipo" class="form-label">Nombre de equipo:</label>
            <input name="nombreDeEquipo" type="text" class="form-control" id="nombreDeEquipo" value="{{ $equipo->NombreEquipo}}" readonly>

        </div>
        <div class="col-md-6">
            <div class="input-group">
                <img id='img_view'src="{{asset('storage')."/".$equipo->LogoEquipo}}" width="250" height="250">
            </div>
            <div class="form-group">
                <label for="">Logotipo del equipo:</label>
                <input type="file" name="logotipoDelEquipo"  accept="image/*" class="form-control">
            </div>
            @error('logotipoDelEquipo')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <div class="img-holder"></div>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn botonSubirLogo">Subir Logotipo</button>
        </div>
    </div>
    </form>
    
</section>
</div>
<div class="botones_jugador">
    <a href="{{url('jugador'.'/'.'create'.'/'. $equipo->IdEquipo)}}" type="button" class="btn botoncreate">Registrar Jugador</a>
    <a href="{{url('tecnico'.'/'.'create'.'/'. $equipo->IdEquipo)}}" type="button" class="btn botoncreate">Registrar Tecnico</a>
</div >
<div class="container" >
    <div class="mask d-flex align-items-center ">
        <div class="container">
            <div class="row d-flex justify-content-center fondo">
                <div class="col-10">
            <div class="card tabla  ">
                            <div class="card-body  pt-0  ">
                                <div class="table-responsive table-scroll rounded-0" data-mdb-perfect-scrollbar="true" style="position: relative; ">
                                    <table class="table table-striped table-borderless border-dark  mb-0 text-center align-middle">
                                                        <thead class="tablasup">
                                                        <tr >
                                                            <th>Categorias </th>
                                                            <th>Jugadores</th>
                                                            <th>Tecnicos</th>
                                                        </tr>
                                                    
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($c as $lista)
                                                            <tr>
                                                                <td class="lista">{{$lista->NombreCategoria}}</td>
                                                                <td class="lista">
                                                                <a href="{{url('editarJugadores'.'/'.$lista->NombreEquipo.'/'.$lista->NombreCategoria)}}" type="button" class="btn botoncreate w-25">Editar</a>
                                                                <a href="{{url('DeleteJugador'.'/'.$lista->NombreEquipo.'/'.$lista->NombreCategoria)}}" type="button" class="btn botoncreate w-25">Eliminar</a>
                                                                </td>
                                                                <td class="lista">
                                                                <a href="{{url('tecnico'.'/'.$lista->NombreEquipo.'/'.$lista->NombreCategoria)}}" type="button" class="btn botoncreate w-25">Editar</a>
                                                                <a href="{{url('eliminar'.'/'.'tecnico'.'/'.$lista->NombreEquipo.'/'.$lista->NombreCategoria)}}" type="button" class="btn botoncreate w-25 ">Eliminar</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    </div>
                                                </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>



<script>
    $(function(){

        //Reset input file
        $('input[type="file"][name="logotipoDelEquipo"]').val('');
        //Image preview
        $('input[type="file"][name="logotipoDelEquipo"]').on('change', function(){
            var img_path = $(this)[0].value;
            var img_holder = $('.img-holder');
            var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

            if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                 if(typeof(FileReader) != 'undefined'){
                      img_holder.empty();
                      var reader = new FileReader();
                      reader.onload = function(e){
                          $('#img_view').attr('src', e.target.result);
                        //   $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).appendTo(img_holder);
                      }
                      img_holder.show();
                      reader.readAsDataURL($(this)[0].files[0]);
                 }else{
                     $(img_holder).html('This browser does not support FileReader');
                 }
            }else{
                $(img_holder).empty();
            }
        });
        

        

    })
</script>
@endsection
</html>