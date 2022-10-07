<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = "equipos";
    protected $primaryKey = 'IdEquipo';
    protected $fillable = ["IdAplicacion","NombreEquipo","LogoEquipo"];
    protected $hidden = ["IdEquipo"];

    public function jugador(){
        return $this->hasMany(Jugador::class, 'IdJugador');
    }
}
