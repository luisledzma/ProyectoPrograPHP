@extends('PaginaPrincipal.master')
@section('titulo','Centros')
@section('contenido')
  <div class="container">
    <div class="row" style="padding-top:50px;">
      <div class="col s12 m8 l6 xl6  offset-m2 offset-l3 offset-xl3 " >
        <blockquote>
          <h5>Editar centro de acopio.</h5>
        </blockquote>
      </div>
        <div class="col s12 m8 l6 xl6  offset-m2 offset-l3 offset-xl3" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
            <form action="{{ route('centro.update') }}" method="post" enctype="multipart/form-data">
              <div class="input-field col s12 m12 l12 xl12">
                <input autocomplete="off" id="name" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" value="{{ $centro->nombre }}" required autofocus>
                <label for="name" >Nombre</label>
                <div class="col s12 m12 l12 xl12">
                    @if ($errors->has('name'))
                    <div class="card-panel red lighten-2 white-text">{{ $errors->first('name') }}</div>
                        <!-- <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span> -->
                    @endif
                </div>
              </div>
              <div class="input-field col s12 m12 l12 xl12">
                  <select id="admin" name="admin">
                    @foreach ($admins as $id => $admin)
                      @if($centro->user_id == $id)
                        <option selected value="{{$id}}"> {{$admin}} </option>
                      @endif
                      @if($centro->user_id != $id)
                        <option value="{{$id}}"> {{$admin}} </option>
                      @endif
                    @endforeach
                  </select>
                  <label>Administrador</label>
                  <div class="col s12 m12 l12 xl12">
                    @if ($errors->has('admin'))
                      <div class="card-panel red lighten-2 white-text">{{ $errors->first('admin') }}</div>
                    @endif
                  </div>
              </div>
              <div class="input-field col s12 m12 l6 xl6">
                <input autocomplete="off" id="province" type="text" value="{{ $centro->provincia }}" class="validate"  name="province">
                <label for="province" >Provincia</label>
                <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('province'))
                    <div class="card-panel red lighten-2 white-text">{{ $errors->first('province') }}</div>
                  @endif
                </div>
              </div>
              <div class="input-field col s12 m12 l6 xl6">
                  <select id="estado" name="estado">
                    @if($centro->deleted_at == null){
                      <option selected value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    }
                    @endif
                    @if($centro->deleted_at != null){
                      <option value="1">Activo</option>
                      <option selected  value="0">Inactivo</option>
                    }
                    @endif
                  </select>
                  <label>Estado</label>
                  <div class="col s12 m12 l12 xl12">
                    @if ($errors->has('estado'))
                      <div class="card-panel red lighten-2 white-text">{{ $errors->first('estado') }}</div>
                    @endif
                  </div>
              </div>
              <div class="input-field col s12 m12 l12 xl12">
                  <textarea
                  class="materialize-textarea"
                  id="direccionExacta"
                  name="direccionExacta">{{$centro->direccionExacta}}</textarea>
                  <label for="direccionExacta">Dirección Exacta</label>
              </div>

              <input type='hidden' name="id" value="{{$centro->id}}">
              @csrf
              <div class="input-field col s12 m12 l12 xl12">
                  <button type="submit" class="btn waves-effect waves-light">Guardar</button>
                  <a href="{{ route('centro.index')}}" class="btn waves-effect waves-light">Regresar</a>
              </div>

            </form>
        </div>

    </div>
  </div>

  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
  </script>
@endsection
