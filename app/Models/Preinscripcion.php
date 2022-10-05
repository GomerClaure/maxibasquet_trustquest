<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    use HasFactory;
    protected $table = "preinscripciones";
    protected $primaryKey = 'IdPreinscripcion';
    protected $fillable = ["IdCampeonato","FechaInicioPreinscripcion","FechaFinPreinscripcion","monto"];
    protected $hidden = ["preinscripcion"];
    
}
