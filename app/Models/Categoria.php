<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'IdCategoria';

    //public function jugador(){
        //return $this->belongsTo('App\Models\Categoria', 'IdCategoria');
        //return $this->hasMany(Jugador::class, 'IdJugador');
    //}
}
