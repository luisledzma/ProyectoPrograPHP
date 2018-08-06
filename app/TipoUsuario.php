<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipousuario extends Model
{
    //
    protected $fillable=['nombre','permissions'];
    public function usuarios() {
      // el 2 paramtro  de la llave foranea de la tabla de afuera    return $this->belongsTo('App\Videojuego','videojuego_id');
      //return $this->hasMany('App\User');
      return $this->belongsToMany(
        'App\User',
        'tipo_user',
        'tipoUsuario_id',
        'user_id'
      )->withTimestamps();
    }

    public function tieneAcceso(array $permisos){
        foreach ($permisos as $permiso) {
          if($this->tienePermiso($permiso)){
            return true;
          }
        }
        return false;
    }

    public function tienePermiso(string $permiso){
      $permisos=json_decode($this->permissions,true);//Obteniendo todos los permisos de ese puesto o rol
      return $permisos[$permiso]??false;
    }
}
