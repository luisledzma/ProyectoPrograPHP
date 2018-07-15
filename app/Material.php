<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Material extends Model{

  protected $fillable=['nombre','imagen','precio','color'];

  public function detCanjes() {
    return $this->hasMany('App\Detcanje');
  }

  public function tipoMaterial() {
    // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
    return $this->belongsTo('App\Tipomaterial');
  }


}
