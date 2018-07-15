<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipousuario extends Model
{
    //
    public function usuarios() {
      // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
      return $this->hasMany('App\Usuario');
    }
}
