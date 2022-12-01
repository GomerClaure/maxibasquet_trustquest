<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delegado extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "delegados";
    protected $dates =['deleted_at'];
    protected $primaryKey = 'IdDelegado';
    protected $fillable = ["IdUsuario","FechaRegistroDelegado","TelefonoDelegado"];
    public $timestamps = false;
}
