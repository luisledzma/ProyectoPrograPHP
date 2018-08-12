<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cupon extends Model{

  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $fillable=['nombre','descripcion','cantEcoNecesarias','imagen'];

  public function usuarios() {
    // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
    //return $this->hasMany('App\User');
    return $this->belongsToMany(
      'App\User',
      'user_cupon',
      'cupon_id',
      'user_id'
    )->withTimestamps();
  }

}
