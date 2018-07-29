@extends('PaginaPrincipal.master')
@section('titulo','Centros')
@section('contenido')
  <div class="row">
      <div class="col s12">
          <form action="{{ route('centro.create') }}" method="post" enctype="multipart/form-data">
            <div class="input-field col s9">
              <input id="name" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" value="{{ old('name') }}" required autofocus>
              <label for="name" >Nombre</label>
              <div class="col s6">
                  @if ($errors->has('name'))
                  <div class="card-panel red-text text-darken-2">{{ $errors->first('name') }}</div>
                      <!-- <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span> -->
                  @endif
              </div>
            </div>
            <div class="input-field col s9">
              <input id="province" type="text" class="validate"  name="province">
              <label for="province" >provincia</label>

            </div>
            <div class="input-field col s9">
                <textarea
                class="materialize-textarea"
                id="direccionExacta"
                name="direccionExacta"></textarea>
                <label for="direccionExacta">Dirección Exacta</label>
            </div>
            <div class="input-field col s9">
                <select id="admin" name="admin">
                  @foreach ($admins as $id => $admin)
                    <option value="{{$id}}"> {{$admin}} </option>
                  @endforeach
                </select>
                @if ($errors->has('admin'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('admin') }}</strong>
                  </span>
                @endif
                <label>Administrador</label>
            </div>

            @csrf
            <div class="input-field col s9">
                <button type="submit" class="btn waves-effect waves-light">Guardar</button>
            </div>

          </form>
      </div>

  </div>
  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
  </script>
@endsection
