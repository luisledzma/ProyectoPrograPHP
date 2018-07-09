<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Usuario extends Model{

  protected $fillable=['nombre','correo','direccion','telefono'];

  public function encCanjes() {
    return $this->hasMany('App\EncCanje');
  }

  public function tipoUsuario() {
    // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
    return $this->belongsTo('App\TipoUsuario');
  }

  public function Centros() {
    return $this->belongsToMany('App\Centro',
    'usuario_centro','usuario_id','centro_id')->withTimestamps();
  }
}
