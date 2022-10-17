<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Products</title>
    <link rel="stylesheet" href="{{asset('css/StyleSubirLogo.css' )}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
@extends('welcome')
@section('content')
<div class="container justify-content-center"">
<section class=" main-title ">
    <h1 class="display-6 mb-0" >Subir logotipo de equipo</h1>
    <p>3er Torneo Internacional de Maxi Basquet</p>
</section>
<section class="form mx-5">
    <form action="" method="post" enctype="multipart/form-data" id="form">
        @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="nombreDeEquipo" class="form-label">Nombre de equipo:</label>
            <input name="nombreDeEquipo" type="text" class="form-control" id="nombreDeEquipo" value="{{ $equipo->NombreEquipo}}">
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <img src="{{asset('storage').'/'.$equipo->LogoEquipo}}" width="362" height="203">
            </div>
            <div class="form-group">
                <label for="">Logotipo del equipo:</label>
                <input type="file" name="product_image" class="form-control">
                <span class="text-danger error-text product_image_error"></span>
            </div>
            <div class="img-holder"></div>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn botonPreinscripcion">Preinscribir Equipo</button>
        </div>
    </div>
    </form>
    
</section>
</div>
<script>
    $(function(){

        $('#form').on('submit', function(e){
            e.preventDefault();

            var form = this;
            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:new FormData(form),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(form).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.code == 0){
                        $.each(data.error, function(prefix,val){
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $(form)[0].reset();
                        // alert(data.msg);
                        fetchAllProducts();
                    }
                }
            });
        });

        //Reset input file
        $('input[type="file"][name="product_image"]').val('');
        //Image preview
        $('input[type="file"][name="product_image"]').on('change', function(){
            var img_path = $(this)[0].value;
            var img_holder = $('.img-holder');
            var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();

            if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                 if(typeof(FileReader) != 'undefined'){
                      img_holder.empty();
                      var reader = new FileReader();
                      reader.onload = function(e){
                          $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:100px;margin-bottom:10px;'}).appendTo(img_holder);
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