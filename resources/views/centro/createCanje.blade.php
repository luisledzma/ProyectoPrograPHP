@extends('PaginaPrincipal.master')
@section('titulo','Crear Canje')
@section('contenido')
@include('partials.errors')
<div class="container">
  <div class="row" style="padding-top:50px;">
      <div class="col s12 m8 l6 xl6  offset-m2 offset-l3 offset-xl3 ">
        <blockquote>
          <h5>Crear Canje.</h5>
        </blockquote>
      </div>
      <div class="col s12 m8 l6 xl6  offset-m2 offset-l1 offset-xl0" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
          <form action="{{ route('centro.canje') }}" method="post" enctype="multipart/form-data">
            <div class="input-field col s12 m12 l12 xl12">
              <input autocomplete="off" id="userid" type="text" class="validate{{ $errors->has('userid') ? ' is-invalid' : '' }}"  name="userid" value="{{ $usuario->id }}" required autofocus>
              <label for="userid" >Usuario ID</label>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('usuarioid'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('usuarioid') }}</div>
                      <!-- <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('usuarioid') }}</strong>
                      </span> -->
                  @endif
              </div>
            </div>

            <div class="input-field col s12 m12 l6 xl6">
              <input autocomplete="off" id="fecha" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="fecha">
              <label for="fecha" >fecha</label>
              <div class="col s12 m12 l12 xl12">
                @if ($errors->has('fecha'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('fecha') }}</div>
                @endif
              </div>
            </div>

            <div class="input-field col s12 m12 l6 xl6">
                <select id="materiales" name="materiales">
                  @foreach ($materiales as $id => $material)
                    <option value="{{$id}}"> {{$material}} </option>
                  @endforeach
                </select>
                <label>Materiales</label>
                <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('materiales'))
                    <div class="card-panel red-text text-darken-2">{{ $errors->first('materiales') }}</div>
                  @endif
                </div>
            </div>

            @csrf
            <div class="input-field col s12 m12 l12 xl12">
                <button type="submit" class="btn waves-effect waves-light">Guardar</button>
                <a href="{{ route('centro.registroCanjes')}}" class="btn waves-effect waves-light">Regresar</a>
                <a href="{{ route('centro.canjeTemporal')}}" class="btn waves-effect waves-light">Prueba</a>
                <a href="{{ route('centro.dCanjeTemp')}}" class="btn waves-effect waves-light">Eliminar</a>
            </div>

          </form>
      </div>

      <div class="col s12 m8 l6 xl6  offset-m2 offset-l1 offset-xl7" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
        <table class="responsive-table striped">
        <thead>
          <tr class="table-success">
            <th scope="col">id Enccanje</th>
            <th scope="col">id Material</th>
            <th scope="col">cantidad</th>
            <th scope="col">SubTotal</th>
          </tr>
        </thead>
        <tbody>
          @if (Session::has('prueba'))
            @foreach (Session::get('prueba') as $det)
            <tr>
              <th scope="row">{{ $det->enccanje_id }}</th>
              <th scope="row">{{ $det->material_id }}</th>
              <th scope="row">{{ $det->cantidad }}</th>
              <th scope="row">{{ $det->subTotal }}</th>
            </tr>
            @endforeach
          @else
            <th scope="row">No existe</th>
          @endif
        </tbody>
      </table>
      </div>

  </div>
</div>

  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
  </script>
@endsection
