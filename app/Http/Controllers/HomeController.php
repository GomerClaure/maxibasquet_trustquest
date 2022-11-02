<?php

namespace App\Http\Controllers;
use App\Models\HomeP;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        return view('PaginaPrincipal.home');

    }
}
