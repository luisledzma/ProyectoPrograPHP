<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centro extends Model{
  use SoftDeletes;
   protected $dates = ['deleted_at'];

  protected $fillable=['nombre','provincia','direccionExacta','user_id','estado'];

  public function encCanjes() {
    return $this->hasMany('App\Enccanje');
  }

  public function user() {
    return $this->belongsTo('App\User');
  }
}
