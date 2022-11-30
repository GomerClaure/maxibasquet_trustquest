<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorias_por_equipo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ="categorias_por_equipo";
    protected $primaryKey = 'Id';
    protected $dates =['deleted_at'];
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
