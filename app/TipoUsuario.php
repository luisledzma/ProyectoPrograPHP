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

    public function tieneAcceso(array $permisos){
        foreach ($permisos as $permiso) {
          if($this->tienePermiso($permiso)){
            return true;
          }
        }
        return false;
    }

    protected function tienePermiso(string $permiso){
      $permisos=json_decode($this->permissions,true);//Obteniendo todos los permisos de ese puesto o rol
      return $permisos[$permiso]??false;
    }
}
