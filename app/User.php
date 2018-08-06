<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','adress','phone','estado'
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



    public function centros() {
      return $this->hasMany('App\Centro');
    }

    public function tipoUsuario() {
      // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
      //return $this->belongsTo('App\TipoUsuario');
      return $this->belongsToMany(
        'App\TipoUsuario',
        'tipo_user',
        'user_id',
        'tipoUsuario_id'
      )->withTimestamps();
    }

    // public function tieneAcceso(array $permisos){
    //     if($this->tipoUsuario->tieneAcceso($permisos)){
    //       return true;
    //     }
    //   return false;
    // }

    public function tieneAcceso(array $permisos){
        foreach ($this->tipoUsuario as $permiso) {
          if($permiso->tieneAcceso($permisos)){
            return true;
          }
        }
        return false;
    }


}
