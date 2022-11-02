<!DOCTYPE html>
<html lang="en">
<head>
    <title>Subir Logo</title>
    <link rel="stylesheet" href="{{asset('css/StyleSubirLogo.css' )}}">
</head>
@extends('welcome')
@section('content')
<div class="container justify-content-center"">
<section class=" main-title ">
    <h1 class="display-6 mb-0" >Subir logotipo de equipo</h1>
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