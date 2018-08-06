<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model{

  use SoftDeletes;
  protected $dates = ['deleted_at'];

  protected $fillable=['nombre','imagen','precio','color'];

  public function detCanjes() {
    return $this->hasMany('App\Detcanje');
  }


}
