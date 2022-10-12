<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;
    protected $table = "tecnicos";
    protected $primaryKey = 'IdTecnicos';
    protected $fillable = ["IdEquipo","IdCategoria","IdPersona","RolesTecnicos"];
    // protected $hidden = ["IdTecnico"];
}
