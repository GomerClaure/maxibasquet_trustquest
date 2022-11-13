<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias_por_equipo extends Model
{
    use HasFactory;
    protected $table ="categoria_por_equipo";
    protected $id = 'Id';
    protected $fillable = ["IdEquipo","IdCategoria","IdCampeonato"];

    public function equipo(){
        return $this->belongsTo(Equipo::class, 'IdEquipo');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'IdCategoria');
    }

    public function campeonato(){
        return $this->belongsTo(Categoria::class, 'IdCampeonato');
    }
}
