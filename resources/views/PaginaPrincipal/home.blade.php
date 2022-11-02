<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/StyleHome.css')}}">
</head>
@extends('nav')
@section('content')

<h1 class="titulo">MAXIBASQUET</h1>
<div class="caru">
<img class="imgh" src="{{asset('storage').'/'.'img_Home'.'/'.'img1.jpg'}}" >
<img  class="imgh" src="{{asset('storage').'/'.'img_Home'.'/'.'img2.jpeg'}}" >
<img  class="imgh" src="{{asset('storage').'/'.'img_Home'.'/'.'img5.jpeg'}}">
</div>


<div class="convocatoria">
  <h2 class="titulo"> Convovatoria </h2>
  <img class="imagenConv" src="">
</div>

@endsection
  
</html>