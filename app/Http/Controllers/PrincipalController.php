<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centro;
use App\User;
use App\Enccanje;
use App\Consecutivo;
use App\Cupon;
use App\Material;
use App\TipoUsuario;
use App\Billeteravirtual;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
{

  public function getIndex(){
    $centros=Centro::all();
    $user = Auth::user();
    $cupones = Cupon::all();
    $materiales = Material::all();
    if($user == null){
      return view('PaginaPrincipal.index',['centros'=>$centros,'materiales'=>$materiales,'cupones'=>$cupones]);
    }
    else{
      $billetera = Billeteravirtual::where('usuario',$user->id)->first();
      return view('PaginaPrincipal.index',['centros'=>$centros,'billetera'=>$billetera,'materiales'=>$materiales,'cupones'=>$cupones]);
    }
    // $billetera = Billeteravirtual::where('usuario',$user->id)->first();
    // $billetera = Billeteravirtual::where('usuario',1)->first();
    // return view('PaginaPrincipal.index',['centros'=>$centros,'billetera'=>$billetera]);
  }


}
