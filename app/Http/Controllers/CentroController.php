<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Centro;
use App\User;

class CentroController extends Controller
{
    //
    public function getCentroIndex(){// ya no necesito la sesión en este caso getCentroIndex(Store $session)
      $centros=Centro::orderBy('nombre','asc');

      //if(Gate::denies('see-all-vj')){
        //$videojuegos=$videojuegos->where('user_id',auth()->user()->id);
      //}
      $centros=$centros->paginate(3);
      return view('centro.index',['centros'=>$centros]);
    }
    public function getCentroCreate(){
      $admins=\App\User::where('tipousuario_id',2)->orderby('name')->pluck('name','id');
      return view('centro.create',compact('admins'));
    }
    public function ctCentroCreate(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|min:5',
          'province' => 'required|min:6',
          'direccionExacta' => 'required',
          'admin'=>'required'
      ]);

        $ct = new Centro([
          'nombre'=>$request->input('name'),
          'provincia'=>$request->input('province'),
          'direccionExacta'=>$request->input('direccionExacta'),
          'user_id'=>$request->input('admin')
        ]);

        $ct->save();//Hace un insert en la BD
        //$user=User::where('id',2);
        //$ct->user()->associate($user);
        /*$Videojuego->addVideojuego($session,
        $request->input('nombre'),
        $request->input('descripcion'),
        $request->input('fechaEstrenoInicial'));*/
        return redirect()
        ->route('centro.index')
        ->with('info', 'Centro: ' . $request->input('name').' creado');
    }
}
