<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{

  public function getIndex(){
    return view('PaginaPrincipal.index');
  }

  public function getRegistro(){
    return view('PaginaPrincipal.registro');
  }

}
