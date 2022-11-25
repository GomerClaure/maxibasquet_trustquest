<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    use HasFactory;
    protected $table = "faltas";
    protected $primaryKey = 'IdFalta';
    protected $fillable = ["IdJugador","IdPlanillaJugador","TipoFalta","CantidadTiroLibre"];
}
