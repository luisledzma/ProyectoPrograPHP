<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cupon;

class CuponController extends Controller
{
  public function getCuponIndex(){
    $cupones=Cupon::withTrashed()->orderBy('nombre','asc');
    $cupones=$cupones->paginate(5);
    return view('cupon.index',['cupones'=>$cupones]);
  }


  public function getCuponCreate(){
    return view('cupon.create');
  }

}
