<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Centro extends Model{

  protected $fillable=['nombre','provincia','direccionExacta','user_id','estado'];

  public function encCanjes() {
    return $this->hasMany('App\Enccanje');
  }

  public function user() {
    return $this->belongsTo('App\User');
  }
}
