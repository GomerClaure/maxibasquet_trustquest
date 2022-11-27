<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoPartido extends Model
{
    use HasFactory;
    protected $table = "datos_partidos";
    protected $primaryKey = 'id';
    protected $fillable = ["IdEquipo","IdPartido","ScoreEquipo"];
    
    public function equipo(){
        return $this->hasMany(Equipo::class, 'IdEquipo');
    }
    public function partido(){
        return $this->belongsTo(Partido::class, 'IdPartido');
    }
}
