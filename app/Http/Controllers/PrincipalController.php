<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centro;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{

  public function getIndex(){
    $centros=Centro::orderBy('nombre','asc');
    return view('PaginaPrincipal.index',['centros'=>$centros]);
  }


}
