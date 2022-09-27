<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicacion extends Model
{
    use HasFactory;
    protected $table = "aplicaciones";
    protected $primaryKey = 'IdAplicacion';
    protected $fillable = ["IdPreinscripcion","IdPreinscripcion","IdPais","NombreUsuario","CorreoElectronico","NumeroTelefono","NombreEquipo","Categorias","EstadoAplicacion","observaciones"];
    protected $hidden = ["IdAplicacion"];
}
