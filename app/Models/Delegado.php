<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegado extends Model
{
    use HasFactory;
    protected $table = "delegados";
    protected $primaryKey = 'IdDelegado';
    protected $fillable = ["IdPersona","IdUsuario","FechaRegistroDelegados","TelefonoDelegados"];
    public $timestamps = false;
}
