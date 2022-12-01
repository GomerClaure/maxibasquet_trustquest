<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/StyleHome.css')}}">
</head>
@extends('nav')
@section('content')

<h1 class="titulo">MAXIBASQUET</h1>
{{-- <div class="container"> --}}
 <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>

  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img  src="{{asset('storage').'/'.'img_Home'.'/'.'img1.jpg'}}" alt="Los Angeles" class="d-block w-100" style="width:100%">
    </div>
    <div class="carousel-item">
      <img  src="{{asset('storage').'/'.'img_Home'.'/'.'img2.jpeg'}}" alt="Chicago" class="d-block w-100" style="width:100%">
    </div>
    <div class="carousel-item">
      <img  src="{{asset('storage').'/'.'img_Home'.'/'.'img5.jpeg'}}" alt="New York" class="d-block w-100" style="width:100%">
    </div>
  </div>

  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
{{-- </div> --}}

<h2 class="titulo"> Convocatoria </h2>
<div class="convocatoria">
  <img class="imgconv" src="{{asset('storage').'/'.'img_Home'.'/'.'convo.jpg'}}">
  <img class="imgconv" src="{{asset('storage').'/'.'img_Home'.'/'.'convocatoriax.png'}}">
</div>

<h1 class="titulo">Noticias</h1>
<div class="noticias"> 
   <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">MAR DEL PLATA ARGENTINA 2023</h5><br><br>
    <p class="card-text">
16 Campeona Mundial de Maxibásquetbol FIMBA
Mar del Plata, Buenos Aires, Argentina 2023.

En los próximos días anunciaremos la fecha exacta, y se realizará la apertura de inscripción.</p>
    
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">SPALDING & FIMBA</h5><br><br>
    <p class="card-text">
Dos potencias del básquetbol mundial se han juntado en una alianza histórica, para elevar al maxibásquetbol a niveles nunca antes vistos.
Spalding es el balón oficial y sponsor de FIMBA, en todas las competencias oficiales.</p>
  
  </div>
</div>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">MALAGA 2020 REPROGRAMADO</h5><br>
    <br>
    <p class="card-text">
Fecha: desde el 26 de junio al 5 de julio, 2020. Fecha pospuesta por la situación del Covid-19.
Nueva fecha reprogramada: desde el 25 de junio al 4 de julio, 2021. Fecha pospuesta por la situación del Covid-19.
Fecha definitiva: desde el 24 de junio al 3 de julio de 2022.</p>
  </div>
</div>
<img class="notas" src="{{asset('storage').'/'.'img_Home'.'/'.'2_2_12.jpg'}}">
</div>
<br><br><section class="">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #444b52;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">Campeonato Maxi Basquet</span>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">TrustQuest.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
</section>
@endsection
</html>