<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $table = "personas";
    protected $primaryKey = 'IdPersona';
    protected $dates =['deleted_at'];
    protected $fillable = ["CiPersona","NombrePersona","ApellidoPaterno","ApellidoMaterno","FechaNacimiento","SexoPersona","Edad","Foto","NacionalidadPersona",];
    protected $hidden = ["IdPersona"];

    public function jugador(){
        return $this->hasMany(Jugador::class, 'IdJugador');
    }


}
