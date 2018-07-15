<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Centro extends Model{

  protected $fillable=['nombre','provincia','direccionExacta'];

  public function encCanjes() {
    return $this->hasMany('App\Enccanje');
  }

  public function Usuarios() {
    return $this->belongsToMany('App\Usuario',
    'usuario_centro','centro_id','usuario_id')->withTimestamps();
  }
}
