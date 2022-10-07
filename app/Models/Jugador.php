<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    protected $table = "jugadores";
    protected $primaryKey = 'IdJugador';
    protected $fillable = ["IdEquipo","IdCategoria","IdPais","IdPersona","PesoJugador","EstaturaJugador","FotoCarnet","PosicionJugador","NumeroCamiseta"];
    protected $hidden = ["IdJugador"];
}
