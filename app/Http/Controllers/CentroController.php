<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Centro;
use App\User;
use App\Enccanje;
use App\Material;
use App\TipoUsuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CentroController extends Controller
{
    //
    public function getCentroIndex(){// ya no necesito la sesión en este caso getCentroIndex(Store $session)
      $centros=Centro::withTrashed()->orderBy('nombre','asc');

      //if(Gate::denies('see-all-vj')){
        //$videojuegos=$videojuegos->where('user_id',auth()->user()->id);
      //}
      $centros=$centros->paginate(5);
      return view('centro.index',['centros'=>$centros]);
    }

    public function getRegistroCanjes(){// ya no necesito la sesión en este caso getCentroIndex(Store $session)
      $canjes=Enccanje::orderBy('created_at','desc');

      //if(Gate::denies('see-all-vj')){
        //$videojuegos=$videojuegos->where('user_id',auth()->user()->id);
      //}
      $canjes=$canjes->paginate(5);
      return view('centro.registoCanjes',['canjes'=>$canjes]);
    }

    public function getCentroEdit($id){
      $centro = Centro::withTrashed()->where('id',$id)->first();
      // $admins=\App\User::where('tipousuario_id',2)->orderby('name')->pluck('name','id');
      $admins = DB::table('users')->join('tipo_user', 'users.id', '=', 'tipo_user.user_id')
      ->where('tipo_user.tipoUsuario_id',2)->orderby('name')->pluck('name','id');
      return view('centro.edit',['centro'=>$centro,'admins'=>$admins]);
    }

    public function getCreateCanje(){
      // $admins=\App\User::where('tipousuario_id',2)->orderby('name')->pluck('name','id');
      $materiales=Material::orderBy('nombre','asc');
      return view('centro.create',['materiales'=>$materiales]);
    }

    public function getCentroCreate(){
      // $admins=\App\User::where('tipousuario_id',2)->orderby('name')->pluck('name','id');
      $admins = DB::table('users')->join('tipo_user', 'users.id', '=', 'tipo_user.user_id')
      ->where('tipo_user.tipoUsuario_id',2)->orderby('name')->pluck('name','id');
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
        ->with('info', 'creado');
    }

    public function CentroUpdate(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|min:5',
          'province' => 'required|min:6',
          'direccionExacta' => 'required',
          'admin'=>'required'
      ]);

      $centro = Centro::withTrashed()->find($request->input('id'));
      $centro->nombre=$request->input('name');
      $centro->provincia=$request->input('province');
      $centro->direccionExacta=$request->input('direccionExacta');
      $centro->user_id=$request->input('admin');
      $centro->deleted_at = $request->input('estado')==0?Carbon::now():null;
      $centro->save();

        return redirect()
        ->route('centro.index')
        ->with('info', 'editado');
    }

}
