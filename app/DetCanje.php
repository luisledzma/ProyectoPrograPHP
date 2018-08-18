<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detcanje extends Model
{
  protected $fillable=['enccanje_id','material_id','cantidad','subTotal'];
    //
    public function encCanje() {
      // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
      return $this->belongsTo('App\Enccanje');
    }

    public function material() {
      return $this->belongsTo('App\Material');
    }
}
