<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanillaJugador extends Model
{
    use HasFactory;
    protected $table = "planilla_jugadores";
    protected $primaryKey = 'IdPlanillaJugador';
    protected $fillable = ["IdPartido"];
}
