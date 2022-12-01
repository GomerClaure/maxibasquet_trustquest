<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugada extends Model
{
    use HasFactory;
    protected $table = "jugadas";
    protected $primaryKey = 'IdJugada';
    protected $fillable = ["IdJugador","IdPartido","TipoJugada","CuartoJugada","HoraJugada"];
}
