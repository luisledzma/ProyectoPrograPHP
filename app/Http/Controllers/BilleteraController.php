<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Billeteravirtual;

class BilleteraController extends Controller
{
    public function getBilletera(){
      $centros=Centro::all();
      $user = Auth::user();
      $materiales = Material::all();
      if($user == null){
        return view('PaginaPrincipal.index',['centros'=>$centros,'materiales'=>$materiales]);
      }
      else{
        $billetera = Billeteravirtual::where('usuario',$user->id)->first();
        return view('PaginaPrincipal.index',['centros'=>$centros,'billetera'=>$billetera,'materiales'=>$materiales]);
      }
      // $billetera = Billeteravirtual::where('usuario',$user->id)->first();
      // $billetera = Billeteravirtual::where('usuario',1)->first();
      // return view('PaginaPrincipal.index',['centros'=>$centros,'billetera'=>$billetera]);
    }
}
