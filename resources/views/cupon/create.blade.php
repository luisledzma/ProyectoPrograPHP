@extends('PaginaPrincipal.master')
@section('titulo','Crear')
@section('contenido')
@include('partials.errors')
<div class="container">
  <div class="row" style="padding-top:50px;">
      <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3 ">
        <blockquote>
          <h5>Mis Cupones.</h5>
        </blockquote>
      </div>
      <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
          <form action="{{ route('material.create') }}" method="post" enctype="multipart/form-data">
            <div class="input-field col s12 m12 l6 xl6">
              <input id="name" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" name="name" value="{{ old('name') }}" required autofocus>
              <label for="name" >Nombre</label>
              <div class="col s12 m12 l12 xl12 ">
                  @if ($errors->has('name'))
                  <div class="card-panel red lighten-2 white-text">{{ $errors->first('name') }}</div>
                  @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l6 xl6">
              <input id="precio" autocomplete="off" type="text" class="validate"  name="precio" required>
              <label for="precio" >Precio unitario</label>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('precio'))
                  <div class="card-panel red lighten-2 white-text">{{ $errors->first('precio') }}</div>
                  @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l12 xl12">
                <textarea
                class="materialize-textarea"
                id="descripcion"
                name="descripcion"></textarea>
                <label for="direccionExacta">Descripción</label>
            </div>
            <div class="input-field col s12 m12 l12 xl12">
              <div class="file-field input-field">
                <div class="btn">
                  <span>Imagen</span>
                  <input id="image" accept="image/*" type="file" class="validate{{ $errors->has('image') ? ' is-invalid' : '' }}"  name="image" value="{{ old('image') }}" required >
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('image'))
                  <div class="card-panel red lighten-2 white-text">{{ $errors->first('image') }}</div>
                  @endif
              </div>
            </div>
            @csrf
            <div class="input-field col s12 m12 l12 xl12">
                <button type="submit" class="btn waves-effect waves-light">Guardar</button>
                <a href="{{ route('cupon.index')}}" class="btn waves-effect waves-light">Regresar</a>
            </div>

          </form>
      </div>

  </div>
  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
  </script>
</div>

@endsection
