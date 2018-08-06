@extends('PaginaPrincipal.master')
@section('titulo', 'Registro')
@section('contenido')
<div class="container">
  <div class="row" style="padding-top:50px;">
    <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4 ">
      <blockquote>
        <h5>Cambiar Contraseña.</h5>
      </blockquote>
    </div>
    @if(Session::has('info'))
      <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4">
        <div class="card-panel red lighten-2 white-text">{{Session::get('info')}}</div>
      </div>
    @endif
    <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
        <form method="POST" action="{{ route('usuario.passUpdate') }}" aria-label="{{ __('Cambiar Contraseña') }}">

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="input-field col s12 m12 l12 xl12">
            <input id="oldpassword" type="password" class="validate{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" name="oldpassword" required>
            <label for="oldpassword" >{{ __('Contraseña Actual') }}</label>
            <div class="col s12 m12 l12 xl12">
                @if ($errors->has('oldpassword'))
                <div class="card-panel red lighten-2 white-text">{{ $errors->first('oldpassword') }}</div>
                @endif
            </div>
          </div>

          <div class="input-field col s12 m12 l12 xl12">
            <input id="password" type="password" class="validate{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            <label for="password" >{{ __('Contraseña Nueva') }}</label>
            <div class="col s12 m12 l12 xl12">
                @if ($errors->has('password'))
                <div class="card-panel red lighten-2 white-text">{{ $errors->first('password') }}</div>
                @endif
            </div>
          </div>

          <div class="input-field col s12 m12 l12 xl12">
            <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>
            <label for="password-confirm" >{{ __('Confirmar Contraseña') }}</label>
            <div class="col s12 m12 l12 xl12">
                @if ($errors->has('password-confirm'))
                <div class="card-panel red lighten-2 white-text">{{ $errors->first('password-confirm') }}</div>
                @endif
            </div>
          </div>

          @csrf
          <div class="input-field col s12 m12 l12 xl12">
              <button type="submit" class="btn waves-effect waves-light">{{ __('Guardar') }}</button>
          </div>

        </form>
    </div>

  </div>

</div>
@endsection
