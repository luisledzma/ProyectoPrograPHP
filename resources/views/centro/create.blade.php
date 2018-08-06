@extends('PaginaPrincipal.master')
@section('titulo','Crear')
@section('contenido')
@include('partials.errors')
<div class="container">
  <div class="row" style="padding-top:50px;">
      <div class="col s12 m8 l6 xl6  offset-m2 offset-l3 offset-xl3 ">
        <blockquote>
          <h5>Agregar centro de acopio.</h5>
        </blockquote>
      </div>
      <div class="col s12 m8 l6 xl6  offset-m2 offset-l3 offset-xl3" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
          <form action="{{ route('centro.create') }}" method="post" enctype="multipart/form-data">
            <div class="input-field col s12 m12 l12 xl12">
              <input autocomplete="off" id="name" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" value="{{ old('name') }}" required autofocus>
              <label for="name" >Nombre</label>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('name'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('name') }}</div>
                      <!-- <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span> -->
                  @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l6 xl6">
                <select id="admin" name="admin">
                  @foreach ($admins as $id => $admin)
                    <option value="{{$id}}"> {{$admin}} </option>
                  @endforeach
                </select>
                <label>Administrador</label>
                <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('admin'))
                    <div class="card-panel red-text text-darken-2">{{ $errors->first('admin') }}</div>
                  @endif
                </div>
            </div>
            <div class="input-field col s12 m12 l6 xl6">
              <input autocomplete="off" id="province" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="province">
              <label for="province" >Provincia</label>
              <div class="col s12 m12 l12 xl12">
                @if ($errors->has('province'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('province') }}</div>
                @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l12 xl12">
                <textarea
                class="materialize-textarea"
                id="direccionExacta"
                name="direccionExacta"></textarea>
                <label for="direccionExacta">Dirección Exacta</label>
            </div>


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
