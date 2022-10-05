<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    protected $table = "transacciones";
    protected $primaryKey = 'IdTransaccion';
    protected $fillable = ["IdAplicacion","NumeroTransaccion","NombreBanco","MontoTransaccion","FechaTransaccion","FotoVaucher",];
    protected $hidden = ["IdTransaccion"];
}
