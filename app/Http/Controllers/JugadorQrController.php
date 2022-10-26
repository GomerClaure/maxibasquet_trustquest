<?php

namespace App\Http\Controllers;

class JugadorQrController extends Controller
{
    public function index ($id)
    {
        echo $id;
        return view("jugador.datosJugadorQr");
    }
}