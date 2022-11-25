<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CuerpoTecnico extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = "tecnicos";
    protected $primaryKey = 'IdTecnicos';
    protected $dates =['deleted_at'];
    protected $fillable = ["IdEquipo","IdCategoria","IdPersona","RolesTecnicos","FotoCarnet"];

    public function equipo(){
        //return $this->belongsTo('App\Models\Equipo', 'IdEquipo');
        return $this->belongsTo(Equipo::class, 'IdEquipo');
    }

    public function categoria(){
        //return $this->belongsTo('App\Models\Categoria', 'IdCategoria');
        return $this->belongsTo(Categoria::class, 'IdCategoria');
    }

    public function persona(){
        //return $this->belongsTo('App\Models\Persona', 'IdPersona');
        return $this->belongsTo(Persona::class, 'IdPersona');
    }
}
