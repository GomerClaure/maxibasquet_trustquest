<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    use HasFactory;
    protected $table = "planillas";
    protected $primaryKey = 'IdPlanilla';
    protected $fillable = ["IdPartido","InicioLlenado","PrimerCuartoJugado","SegundoCuartoJugado","TercerCuartoJugado","CuartoCuartoJugado","observaciones"];
}
