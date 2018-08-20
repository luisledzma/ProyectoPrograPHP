<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Centro;
use App\Material;
use App\Billeteravirtual;
use App\TipoUsuario;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Auth;
use Gate;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
  public function getUsuarioIndex(){// ya no necesito la sesión en este caso getCentroIndex(Store $session)
    $users = DB::table('users')->join('tipo_user', 'users.id', '=', 'tipo_user.user_id')->select('users.*','tipoUsuario_id')
    ->orderby('name');
    $users=$users->paginate(5);
    return view('usuario.index',['users'=>$users]);
  }

  public function getUsuarioIndexClientes(){// ya no necesito la sesión en este caso getCentroIndex(Store $session)
    // $users=User::withTrashed()->where('tipousuario_id',3)->orderBy('name','asc');
    $users = DB::table('users')->join('tipo_user', 'users.id', '=', 'tipo_user.user_id')->select('users.*','tipoUsuario_id')
    ->where('tipo_user.tipoUsuario_id',3)->orderby('name');
    $users=$users->paginate(5);
    return view('usuario.index',['users'=>$users]);
  }

  public function getUsuarioCreate(){
    $tipoUsuario=TipoUsuario::all();
    return view('usuario.create',['tipoUsuario'=>$tipoUsuario]);
  }

  protected function UsuarioCreate(Request $request)
  {
    $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'adress' => 'required|string|min:6|max:255',
        'phone' => 'required|string|min:8',
    ]);

      $user = User::create([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => Hash::make('123456'),
          'adress' => $request->input('adress'),
          'phone' => $request->input('phone'),
      ]);
      $user->tipoUsuario()->attach($request->input('tipousuario_id'));

      return redirect()
      ->route('usuario.index')
      ->with('info', 'creado');

  }

  public function getUsuarioEdit($id){
    $usuario = DB::table('users')->join('tipo_user', 'users.id', '=', 'tipo_user.user_id')->select('users.*','tipoUsuario_id')
    ->where('users.id',$id)->first();
    $tipoUsuario=TipoUsuario::all();
    return view('usuario.edit',['usuario'=>$usuario,'tipoUsuario'=>$tipoUsuario]);
  }

  public function UsuarioUpdate(Request $request)
  {
    $this->validate($request, [
        'name' => 'required|string|max:255',
        // 'email' => 'required|string|email|max:255|unique:users',
        'adress' => 'required|string|min:6|max:255',
        'phone' => 'required|string|min:8',
    ]);

    $usuario= User::withTrashed()->find($request->input('id'));
    $usuario->name=$request->input('name');
    // $usuario->email=$request->input('email');
    $usuario->adress = $request->input('adress');
    $usuario->phone = $request->input('phone');
    DB::table('tipo_user')->where('user_id',$usuario->id)->delete();
    $usuario->tipoUsuario()->attach($request->input('tipousuario_id'));
    $usuario->deleted_at = $request->input('estado')==0?Carbon::now():null;
    $usuario->save();

      return redirect()
      ->route('usuario.index')
      ->with('info', 'editado');
  }


  public function getUsuarioPassword(){
    $centros=Centro::all();
    $usuario = Auth::user();
    $materiales = Material::all();

    $billetera = Billeteravirtual::where('usuario',$usuario->id)->first();
    return view('auth.passwords.reset',['token'=>$usuario->token,'centros'=>$centros,'billetera'=>$billetera,'materiales'=>$materiales]);



  }

  public function PasswordUpdate(Request $request)
  {
    if(Auth::Check()){

      $this->validate($request, [
          'oldpassword' => 'required',
          'password' => 'required|string|min:6|same:password',
          'password_confirmation' => 'required|string|min:6|same:password',
      ]);


      $miUsuario = Auth::user();
      $oldpassword=$request->input('oldpassword');
      if (Hash::check($oldpassword, $miUsuario->password)){
        $user = User::find($miUsuario->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()
        ->route('pr.index')
        ->with('info', 'La Contraseña se ha cambiado correctamente');
      }
      else{
        return redirect()
        ->route('usuario.password')
        ->with('info', 'Su contraseña actual no coincide con la digitada.');
      }

    }
    else{
      return redirect()->to('/');
    }



  }


}
