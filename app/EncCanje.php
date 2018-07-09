<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncCanje extends Model
{
  protected $fillable=['fecha','total'];
    //
    public function usuario() {
      // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
      return $this->belongsTo('App\Usuario');
    }

    public function centro() {
      return $this->belongsTo('App\Centro');
    }
}
