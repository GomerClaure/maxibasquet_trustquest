<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credencial extends Model
{
    protected $table = "credenciales";
    protected $primaryKey = 'IdCredencial';
    protected $fillable = ["IdPersona","CodigoQR"];
    public $timestamps = false;
    use HasFactory;
}
