<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'personas';
    protected $primaryKey = 'IdPersona';

    public function jugador(){
        return $this->hasMany(Jugador::class, 'IdJugador');
    }
}
