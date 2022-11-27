<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $table = "partidos";
    protected $primaryKey = 'IdPartido';
    protected $fillable = ["HoraPartido","LugarPartido","FechaPartido","EstadoPartido"];

    public function datosPartido(){
        return $this->hasMany(DatoPartido::class, 'IdPartido');
    }
}
