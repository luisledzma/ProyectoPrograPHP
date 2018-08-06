@extends('PaginaPrincipal.master')
@section('titulo', 'Registro')
@section('contenido')
<div class="container">
    <div class="row ">


      <div class="col s12 m8 l5 xl5 offset-m2 offset-l3 offset-xl3 ">
        <blockquote>
          <h5>Agregar centro de acopio.</h5>
        </blockquote>
      </div>
      <div class="row">
        <div class="col s12 m8 l5 xl5 offset-m2 offset-l3 offset-xl3">

          <div class="card darken-1">
            <div class="card-content ">
              <div class="col s12">
                @if (session('status'))
                  <div class="card-panel green lighten-2 white-text">{{ session('status') }}</div>
                @endif
              </div>
              <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                  @csrf

                  <div class="row">
                      <div class="input-field col s12">
                    <input id="email" autocomplete="off" type="email" class="validate{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                      <label for="email" >{{ __('Correo Electrónico') }}</label>
                      <div class="col s6">
                          @if ($errors->has('email'))
                          <div class="card-panel red lighten-2 white-text">{{ $errors->first('email') }}</div>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div class="card-action offset-2">
                    <button type="submit" class="btn waves-effect waves-light">
                        {{ __('Enviar al Correo') }}
                    </button>
                  </div>
              </form>
            </div>

          </div>
        </div>
      </div>


        <div class="col s12 m12 l8 xl8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="card-panel green lighten-2 white-text">{{ session('status') }}</div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
