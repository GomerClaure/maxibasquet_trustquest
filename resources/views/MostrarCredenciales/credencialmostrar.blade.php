<!DOCTYPE html>
<html lang="en">
<head>
    <title>Credenciales</title>
    <link rel="stylesheet" href="{{asset('css/StyleCredencialesMostrar.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>
@extends('nav') 
@section('content')
<br>
<div class="botonesCat">
@foreach($NomCategorias as $categorias)
    <a type="button" class="botone" href="/credenciales/{{$NomEquipo}}/{{$categorias[0]->NombreCategoria}}"> Categoria: {{$categorias[0]->NombreCategoria}} </a>
    <br>
@endforeach
</div>
@endsection