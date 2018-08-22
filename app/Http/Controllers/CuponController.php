<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cupon;
use Carbon\Carbon;
use Auth;
use Gate;
use PDF;
use App\Centro;
use App\User;
use App\Enccanje;
use App\Consecutivo;
use App\Material;
use App\TipoUsuario;
use App\Billeteravirtual;
use Illuminate\Support\Facades\DB;


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

  public function getCambiarCupon(){
    $centros=Centro::all();
    $user = Auth::user();
    $cupones = Cupon::all();
    $materiales = Material::all();
    if($user == null){
      return view('cupon.cupones',['centros'=>$centros,'materiales'=>$materiales,'cupones'=>$cupones]);
    }
    else{
      $billetera = Billeteravirtual::where('usuario',$user->id)->first();
      return view('cupon.cupones',['centros'=>$centros,'billetera'=>$billetera,'materiales'=>$materiales,'cupones'=>$cupones]);
    }
    // return view('cupon.cupones');
  }

  public function CuponCambiar(Request $request)
  {
        $this->validate($request, [
          'cupon' => 'required|numeric|min:1'
      ]);
      $cupon = Cupon::find($request->input('cupon'));
      if($cupon == null){
        return redirect()
        ->route('cupon.cambiarCup')
        ->with('info', 'El cupón no existe');
      }
      $user = Auth::user();
      $billetera = Billeteravirtual::where('usuario',$user->id)->first();
      if($billetera->cantEcoDisponibles >= $cupon->cantEcoNecesarias){
        $billetera->cantEcoDisponibles -= $cupon->cantEcoNecesarias;
        $billetera->cantEcoPorTiquetes += $cupon->cantEcoNecesarias;
        $billetera->cantEcoTotal += 0;
        $billetera->save();

        $pdf=PDF::loadView('cupon.reportePDF',compact('cupon'));
        return $pdf->download('reportePDF-'.time().'.pdf');
      }
      else{
        return redirect()
        ->route('cupon.cambiarCup')
        ->with('info', 'No posee la cantidad de ecomonedas necesarias');
      }

  }


  public function cuponCreate(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|min:4',
          'image'=>'required|image',
          'precio' => 'required|numeric|min:1',
          'descripcion' => 'required|string|min:1',
      ]);

        $ruta=$request->file('image')->store(
          'images','public'
        );
        $cupon=new Cupon([
          'nombre'=>$request->input('name'),
          'descripcion'=>$request->input('descripcion'),
          'cantEcoNecesarias'=>$request->input('precio'),
          'imagen'=>$ruta,
        ]);
        $cupon->save();
        return redirect()
        ->route('cupon.indexC')
        ->with('info', 'Guardado');
    }

    public function getCuponEdit($id){
      $cupon = Cupon::withTrashed()->find($id);
      return view('cupon.edit',['cupon'=>$cupon]);
    }
    public function getCuponDet($id){
      $cupon = Cupon::withTrashed()->find($id);
      return view('cupon.detalle',['cupon'=>$cupon]);
    }

    public function CuponUpdate(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|min:4',
        'precio' => 'required|numeric|min:1',
        'descripcion' => 'required|string|min:1',
      ]);

      $cupon=Cupon::withTrashed()->find($request->input('id'));

      if(!($request->file('image')===null) || !($request->file('image')=="")){
        Storage::disk('public')->delete($cupon->imagen);
        $ruta=$request->file('image')->store(
          'images','public'
        );
        $cupon->imagen=$ruta;
      }

        $cupon->nombre=$request->input('name');
        $cupon->descripcion=$request->input('descripcion');
        $cupon->cantEcoNecesarias=$request->input('precio');
        $cupon->deleted_at=$request->input('estado')==0?Carbon::now():null;
        $cupon->save();

        return redirect()
        ->route('cupon.indexC')
        ->with('info', 'Editado');
    }

}
