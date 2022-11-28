<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tecnico extends Model
{   use SoftDeletes;
    use HasFactory;
    protected $table = "tecnicos";
    protected $primaryKey = 'IdTecnicos';
    protected $dates =['deleted_at'];
    protected $fillable = ["IdEquipo","IdCategoria","IdPersona","RolesTecnicos"];
    public $timestamps = false;
    // protected $hidden = ["IdTecnico"];
}
