<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credencial extends Model
{
    use SoftDeletes;
    protected $table = "credenciales";
    protected $primaryKey = 'IdCredencial';
    protected $dates =['deleted_at'];
    protected $fillable = ["IdPersona","CodigoQR"];
    public $timestamps = true;
    use HasFactory;
}
