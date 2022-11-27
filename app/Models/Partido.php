<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $table = "partidos";
    protected $primaryKey = 'IdPartido';
    protected $fillable = ["HoraPartido","IdCategoria","LugarPartido","FechaPartido","EstadoPartido"];

    public function datosPartido(){
        return $this->belongsTo(DatoPartido::class, 'IdPartido');
    }
}
