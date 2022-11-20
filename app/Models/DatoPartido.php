<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoPartido extends Model
{
    use HasFactory;
    protected $table = "datos_equipo";
    protected $primaryKey = 'id';
    protected $fillable = ["IdEquipo","IdPartido","ScoreEquipo"];
    
}
