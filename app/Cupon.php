<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Cupon extends Model{

  protected $fillable=['nombre','descripcion','cantEcoNecesarias'];

}
