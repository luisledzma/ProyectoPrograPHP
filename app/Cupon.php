<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cupon extends Model{

  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $fillable=['nombre','descripcion','cantEcoNecesarias','imagen'];

}
