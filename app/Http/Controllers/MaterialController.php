<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use Auth;
use Gate;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class MaterialController extends Controller
{
  public function getMaterialIndex(){
    $materiales=Material::withTrashed()->orderBy('nombre','asc');
    $materiales=$materiales->paginate(5);
    return view('materiales.index',['materiales'=>$materiales]);
  }

  public function getMaterialCreate(){
    return view('materiales.create');
  }

  public function MaterialCreate(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|min:4',
          'image'=>'required|image',
          'precio' => 'required|numeric|min:1',
          'color' => 'required|string|min:1',
      ]);

        $ruta=$request->file('image')->store(
          'images','public'
        );
        $material=new Material([
          'nombre'=>$request->input('name'),
          'imagen'=>$ruta,
          'precio'=>$request->input('precio'),
          'color'=>$request->input('color'),
        ]);
        $material->save();
        return redirect()
        ->route('material.index')
        ->with('info', 'Guardado');
    }

    public function getMaterialEdit($id){
      $material = Material::withTrashed()->find($id);
      return view('materiales.edit',['material'=>$material]);
    }

    public function MaterialUpdate(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|min:4',
        'precio' => 'required|numeric|min:1',
        'color' => 'required|string|min:1',
      ]);

      $material=Material::withTrashed()->find($request->input('id'));

      if(!($request->file('image')===null) || !($request->file('image')=="")){
        Storage::disk('public')->delete($material->imagen);
        $ruta=$request->file('image')->store(
          'images','public'
        );
        $material->imagen=$ruta;
      }
      
        $material->nombre=$request->input('name');
        $material->precio=$request->input('precio');
        $material->color=$request->input('color');
        $material->deleted_at=$request->input('estado')==0?Carbon::now():null;
        $material->save();

        return redirect()
        ->route('material.index')
        ->with('info', 'Editado');
    }

}
