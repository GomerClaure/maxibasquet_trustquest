<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;
    protected $table = "jugadores";
    protected $primaryKey = 'IdJugador';
    protected $fillable = ["IdEquipo","IdCategoria","IdPais","IdPersona","PesoJugador","AlturaJugador","FotosCarnet","PosicionJugador","NumeroCamiseta","Nacionalidad","HabilitacionJugador"];
    protected $hidden = ["IdJugador"];
}
