<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona2 extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "personas";
    protected $primaryKey = 'IdPersona';
    protected $fillable = ["CiPersona","NombrePersona","ApellidoPaterno","ApellidoMaterno","FechaNacimiento","SexoPersona","Edad","Foto","NacionalidadPersona",];
    protected $hidden = ["IdPersona"];
}
