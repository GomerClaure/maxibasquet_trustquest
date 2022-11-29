<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuecesPorPartido extends Model
{
    use HasFactory;
    protected $table = "jueces_por_partidos";
    protected $primaryKey = 'Id ';
    protected $fillable = ["IdPartido","IdJuez","TipoJuez"];
}
