@extends('PaginaPrincipal.master')
@section('titulo','Usuarios')
@section('contenido')
@include('partials.errors')
<div class="container">
  <div class="row" style="padding-top:50px;">
      <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3">
        <blockquote>
          <h5>Agregar nuevo usuario.</h5>
        </blockquote>
      </div>
      <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
          <form action="{{ route('usuario.create') }}" method="post" enctype="multipart/form-data">
            <div class="input-field col s12 m12 l12 xl12">
              <input autocomplete="off" id="name" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" value="{{ old('name') }}" required autofocus>
              <label for="name" >Nombre</label>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('name'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('name') }}</div>
                  @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l12 xl12">
              <input autocomplete="off" id="email" type="email" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') }}" required autofocus>
              <label for="email" >Correo Electrónico</label>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('email'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('email') }}</div>
                  @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l4 xl4">
              <input autocomplete="off" id="phone" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="phone" value="{{ old('phone') }}" required autofocus>
              <label for="phone" >Teléfono</label>
              <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('phone'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('phone') }}</div>
                  @endif
              </div>
            </div>
            <div class="input-field col s12 m12 l8 xl8">
                <select id="tipousuario_id" name="tipousuario_id">
                  @foreach ($tipoUsuario as $tU )
                    <option value="{{$tU->id}}"> {{$tU->nombre}} </option>
                  @endforeach
                </select>
                <label>Rol</label>
                <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('tipousuario_id'))
                    <div class="card-panel red-text text-darken-2">{{ $errors->first('tipousuario_id') }}</div>
                  @endif
                </div>
            </div>
            <div class="input-field col s12 m12 l12 xl12">
                <textarea
                class="materialize-textarea"
                id="adress"
                name="adress"></textarea>
                <label for="adress">Dirección</label>
                <div class="col s12 m12 l12 xl12">
                  @if ($errors->has('adress'))
                    <div class="card-panel red-text text-darken-2">{{ $errors->first('adress') }}</div>
                  @endif
                </div>
            </div>
            @csrf
            <div class="input-field col s12 m12 l12 xl12">
                <button type="submit" class="btn waves-effect waves-light">Guardar</button>
                <a href="{{ route('usuario.index')}}" class="btn waves-effect waves-light">Regresar</a>
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
