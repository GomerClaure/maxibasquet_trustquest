<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{   
    use HasFactory;
    use SoftDeletes;
    protected $table = "equipos";
    protected $primaryKey = 'IdEquipo';
    protected $dates =['deleted_at'];
    protected $fillable = ["IdDelegado","IdAplicacion","NombreEquipo","LogoEquipo"];
    protected $hidden = ["IdEquipo"];

    public function jugador(){
        return $this->hasMany(Jugador::class, 'IdJugador');
    }

    
}
