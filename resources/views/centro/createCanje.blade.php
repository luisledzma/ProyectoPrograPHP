@extends('PaginaPrincipal.master')
@section('titulo','Crear Canje')
@section('contenido')
@include('partials.errors')
<div class="container">
  @if(Session::has('miCanje'))
  <div class="row" style="padding-top:50px;">
    @if(Session::has('info'))
          <div class="row">
              <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3">
                <div class="card-panel red-text text-darken-2">{{Session::get('info')}}</div>
                <!-- <script>
                  M.toast({html: 'Cambios guardados correctamente.'})
                </script> -->
              </div>
          </div>
    @endif
    <div class="col s12 m8 l5 xl5 ">
      <div class="col s12 m12 l12 xl12">
        <blockquote>
          <h5>Guardar Material.</h5>
        </blockquote>
      </div>
      <div class="col s12 m12 l12 xl12" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
          <form action="{{ route('centro.miDet') }}" method="post" enctype="multipart/form-data">

            <div class="input-field col s12 m12 l7 xl7">
                <select id="material" name="material">
                  @foreach ($materiales as $id => $material)
                    <option value="{{$id}}"> {{$material}} </option>
                  @endforeach
                </select>
                <label>Material</label>
                <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('material'))
                    <div class="card-panel red-text text-darken-2">{{ $errors->first('material') }}</div>
                  @endif
                </div>
            </div>

            <div class="input-field col s6 m6 l5 xl5">
              <input autocomplete="off" id="cantidad" type="text" class="validate{{ $errors->has('cantidad') ? ' is-invalid' : '' }}"  name="cantidad">
              <label for="cantidad" >Cantidad</label>
              <div class="col s12 m12 l12 xl12">
                @if ($errors->has('cantidad'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('cantidad') }}</div>
                @endif
              </div>
            </div>

            @csrf
            <div class="input-field col s12 m12 l12 xl12">
                <button type="submit" class="btn waves-effect waves-light">Guardar</button>
            </div>
          </form>
      </div>
    </div>
    <div class="col s12 m8 l7 xl7">
      <div class="col s12 m12 l12 xl12">
        <blockquote>
          <h5>Materiales Agregados.</h5>
        </blockquote>
      </div>
      <div class="col s12 m12 l12 xl12 " style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
        <table class="responsive-table striped">
        <thead>
          <tr class="table-success">
            <th scope="col">Material</th>
            <th scope="col">Cantidad</th>
            <th scope="col">SubTotal</th>
          </tr>
        </thead>
        <tbody>
          @if (Session::has('miDet'))
            @foreach (Session::get('miDet') as $det)
            <tr>
                @foreach ($materiales as $id => $material)
                  @if($id == $det->material_id)
                    <th scope="row">{{ $material }}</th>
                  @endif
                @endforeach
              <th scope="row">{{ $det->cantidad }}</th>
              <th scope="row">{{ $det->subTotal }}</th>
            </tr>
            @endforeach
          @else
            <th scope="row">No hay registros</th>
          @endif

        </tbody>
      </table>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4">
      <div class="input-field col s12 m12 l12 xl12 ">
          <a href="{{ route('centro.regresarCanje')}}" class="btn waves-effect waves-light">Regresar</a>
          <a href="{{ route('centro.saveCanje')}}" class="btn waves-effect waves-light">Guardar</a>
      </div>
    </div>
  </div>
  @else
  <div class="row">
    @if(Session::has('info'))
          <div class="row">
              <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3">
                <div class="card-panel red-text text-darken-2">{{Session::get('info')}}</div>
                <!-- <script>
                  M.toast({html: 'Cambios guardados correctamente.'})
                </script> -->
              </div>
          </div>
    @endif
    <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3 ">
      <div class="col s12 m12 l12 xl12">
        <blockquote>
          <h5>Crear Canje.</h5>
        </blockquote>
      </div>
      <div class="col s12 m12 l12 xl12 " style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
        <form action="{{ route('centro.miCanje') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
        <div class="input-field col s12 m12 l12 xl12">
          <input autocomplete="off" id="email" type="email" class="validate{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" required autofocus>
          <label for="userid" >Correo Electrónico</label>
          <div class="col s12 m12 l12 xl12">
              @if ($errors->has('email'))
              <div class="card-panel red-text text-darken-2">{{ $errors->first('email') }}</div>
              @endif
          </div>
        </div>
        <div class="input-field col s12 m12 l7 xl7">
            <select id="centro" name="centro">
              @foreach ($centros as $ct)
                <option value="{{ $ct->id }}">{{ $ct->nombre }}</option>
              @endforeach
              <!-- <option value="1">Centro</option> -->
            </select>
            <label>Centro de Acopio</label>
            <div class="col s12 m12 l12 xl12">
              @if ($errors->has('centro'))
                <div class="card-panel red-text text-darken-2">{{ $errors->first('centro') }}</div>
              @endif
            </div>
        </div>
        <div class="input-field col s12 m12 l12 xl12">
          <button type="submit" class="btn waves-effect waves-light">Siguiente</button>
        </div>
      </form>
      </div>
    </div>

  </div>

  @endif


</div>

  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });

  </script>
@endsection
