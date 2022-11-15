<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table = "paises";
    protected $primaryKey = 'IdAplicacion';
    protected $fillable = ["IdPais","NombrePais","CodigoPais","Nacionalidad","Region"];
    protected $hidden = ["pais"];
}
