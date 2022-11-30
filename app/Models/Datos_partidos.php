<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos_partidos extends Model
{
    use HasFactory;
    protected $table ="datos_partidos";
    protected $id = 'id';
    protected $fillable = ["IdEquipo","IdPartido","ScoreEquipo"];
}
