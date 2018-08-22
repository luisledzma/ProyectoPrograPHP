<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Centro;
use App\User;
use App\Enccanje;
use App\Consecutivo;
use App\Material;
use App\TipoUsuario;
use App\Billeteravirtual;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Charts\Graficos;
use Session;

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

    public function grafico()
    {
      $chart = new Graficos();

      $titulo="Promedio del total de eco monedas por centro de acopio";
      $ecos = Enccanje::select(DB::raw("avg(total) as Promedio") ,
    DB::raw("centro_id"))
    ->orderBy('id')
    ->groupby(DB::raw("centro_id"))
    ->with('centro')
    ->get();
    $etiquetas=[];
    foreach($ecos as $eco){
      $etiquetas[]=$eco->centro->nombre;
    }
$cantidades=$ecos->pluck('Promedio');

      //labels
      $chart->labels($etiquetas);

    $dataset=$chart->dataset($titulo, 'pie',$cantidades);
    $dataset->backgroundColor(['#a9cce3', ' #a9dfbf', '#fad7a0','#c39bd3','#f9e79f','#a3e4d7', '#fadbd8', '#e59866']);
    $dataset->color(['#2980b9', '#52be80', '#f0b27a','#7d3c98', '#f4d03f','#48c9b0','#f1948a','#d35400']);

    return view('centro.grafico', ['chart' => $chart]);
    }

    //CANJES----------------------------------------

    public function getCreateCanje(){
      $miUsuario = Auth::user();
      $centros = Centro::where('user_id',$miUsuario->id)->get();
      // $centros = Centro::all();
      $materiales=Material::orderBy('nombre','asc')->pluck('nombre','id');
      return view('centro.createCanje',['materiales'=>$materiales,'centros'=>$centros]);
    }

    public function ValidaUsuarioCanje(Request $request){
      $this->validate($request, [
          'email' => 'required|min:5',
          'centro' => 'required',
      ]);
      $user = DB::table('users')->join('tipo_user', 'users.id', '=', 'tipo_user.user_id')
      ->where('tipo_user.tipoUsuario_id',3)->where('email',$request->input('email'))->first();
      // $user = User::where('email',$request->input('email'))->first();
      if($user == null){
        return redirect()
        ->route('centro.canje')
        ->with('info', 'El correo Electrónico no es valido');
      }
      else{
        $consecutivo = Consecutivo::where('nombre','Canje')->first();
        $miCons = $consecutivo->consecutivo;
        $consecutivo->consecutivo = $miCons + 1;
        $consecutivo->save();

        $Enc = new \App\Enccanje;
        $Enc->consecutivo = $miCons;
        $Enc->usuario_id = $user->id;
        $Enc->centro_id = $request->input('centro');
        $Enc->fecha = Carbon::now();
        $infoEnc[] = $Enc;
        Session::put('miCanje', $infoEnc);
        return redirect()
        ->route('centro.canje');
      }
    }


    public function CreateDetalle(Request $request){

      $this->validate($request, [
          'material' => 'required',
          'cantidad'=>'required|numeric|min:1'
      ]);
      $mat = Material::find($request->input('material'));

      $Enc = Session::get('miCanje.consecutivo');
      $det = new \App\Detcanje;

      $det->enccanje_id = $Enc;
      $det->material_id = $request->input('material');
      $det->cantidad = $request->input('cantidad');
      $det->subTotal = $mat->precio * $request->input('cantidad');

      if (Session::has('miDet')) {
        $temporal = Session::pull('miDet');
        $temporal[] = $det;
        Session::put('miDet', $temporal);
      }else {
        $infodet[] = $det;
        Session::put('miDet', $infodet);
      }

      $miUsuario = Auth::user();
      $centros = Centro::where('user_id',$miUsuario->id)->get();
      $materiales=Material::orderBy('nombre','asc')->pluck('nombre','id');
      return view('centro.createCanje',['materiales'=>$materiales,'centros'=>$centros])->with('miDet');


    }

    public function RegresarCanje(){
      // $admins=\App\User::where('tipousuario_id',2)->orderby('name')->pluck('name','id');
      Session::forget('miCanje');
      Session::forget('miDet');
      $miUsuario = Auth::user();
      $centros = Centro::where('user_id',$miUsuario->id)->get();
      $materiales=Material::orderBy('nombre','asc')->pluck('nombre','id');
      return view('centro.createCanje',['materiales'=>$materiales,'centros'=>$centros]);

    }

    public function GuardarMiCanje(){
      $Enc = new \App\Enccanje;
      foreach (Session::get('miCanje') as $Can) {
        $Enc->usuario_id = $Can->usuario_id;
        $Enc->centro_id = $Can->centro_id;
        $Enc->fecha = $Can->fecha;
        $Enc->consecutivo = $Can->consecutivo;
      }
      foreach (Session::get('miDet') as $dt) {
        $Enc->total += $dt->subTotal;
      }
      $Enc->save();

      foreach (Session::get('miDet') as $dt) {
        $det = new \App\Detcanje;
        $det->enccanje_id = $Enc->consecutivo;
        $det->material_id = $dt->material_id;
        $det->cantidad = $dt->cantidad;
        $det->subTotal = $dt->subTotal;
        $det->save();
      }

      $billetera = Billeteravirtual::where('usuario',$Enc->usuario_id)->first();
      $billetera->cantEcoDisponibles += $Enc->total;
      $billetera->cantEcoPorTiquetes += 0;
      $billetera->cantEcoTotal += $Enc->total;
      $billetera->save();

      Session::forget('miCanje');
      Session::forget('miDet');

      $canjes=Enccanje::orderBy('created_at','desc');
      $canjes=$canjes->paginate(5);
      return redirect()
      ->route('centro.registroCanjes',['canjes'=>$canjes])
      ->with('info', 'creado');
      // return view('centro.registoCanjes',['canjes'=>$canjes])->with('info','Completado');;

    }

    //--------------------------------------------------------------

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
