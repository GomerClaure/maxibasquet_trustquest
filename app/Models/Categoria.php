<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = "categorias";
    protected $primaryKey = 'IdCategoria';
    protected $fillable = ["NombreCategoria","EdadMaxima","EdadMinima"];
    public $timestamps = false;

    public function jugador(){
        return $this->hasMany(Jugador::class, 'IdJugador');
    }
}
