<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','adress','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function encCanjes() {
      return $this->hasMany('App\Enccanje');
    }

    public function tipoUsuario() {
      // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
      return $this->belongsTo('App\Tipousuario');
    }

    public function Centros() {
      return $this->belongsToMany('App\Centro',
      'usuario_centro','usuario_id','centro_id')->withTimestamps();
    }

}
