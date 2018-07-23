@extends('PaginaPrincipal.master')
@section('titulo', 'Registro')
@section('contenido')
<div class="container">
    <div class="row ">



      <div class="row">
        <div class="col s5 offset-s3">
          <div class="card darken-1">
            <div class="card-content ">
              <span class="card-title">{{ __('Recuperar Contraseña') }}</span>
              <div class="col s12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
              </div>
              <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                  @csrf

                  <div class="row">
                      <div class="input-field col s12">
                    <input id="email" type="email" class="validate{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                      <label for="email" >{{ __('Correo Electrónico') }}</label>
                      <div class="col s6">
                          @if ($errors->has('email'))
                          <div class="card-panel red-text text-darken-2">{{ $errors->first('email') }}</div>
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


        <div class="col s8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
