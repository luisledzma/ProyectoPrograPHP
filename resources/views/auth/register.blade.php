@extends('PaginaPrincipal.master')
@section('titulo', 'Registro')
@section('contenido')
<div class="container">
    <div class="row ">
        <div class="col s8 offset-s2">
            <div class="card horizontal">
              <div class="card-image">
                <img src="{{ URL::to('img/arbol.png') }}">
              </div>

              <div class="card-stacked">
                <div class="card-content">
                  <div class="row">
                    <form class="col s12" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="row">
                          <div class="input-field col s9">
                            <input id="name" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" value="{{ old('name') }}" required autofocus>
                            <label for="name" >{{ __('Nombre') }}</label>
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
                            <input id="email" type="email" class="validate{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="email" >{{ __('Correo Electrónico') }}</label>
                            <div class="col s12">
                                @if ($errors->has('email'))
                                <div class="card-panel red-text text-darken-2">{{ $errors->first('email') }}</div>
                                    <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> -->
                                @endif
                            </div>
                          </div>
                          <div class="input-field col s9 ">
                            <input id="password" type="password" class="validate{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            <label for="password" >{{ __('Contraseña') }}</label>
                            <div class="col s12">
                                @if ($errors->has('password'))
                                <div class="card-panel red-text text-darken-2">{{ $errors->first('password') }}</div>
                                    <!-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> -->
                                @endif
                            </div>
                          </div>
                          <div class="input-field col s9 ">
                            <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>
                            <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                          </div>
                          <div class="input-field col s9 ">
                            <input id="adress" type="text" class="validate{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" required>
                            <label for="adress" >{{ __('Dirección') }}</label>
                            <div class="col s12">
                                @if ($errors->has('adress'))
                                <div class="card-panel red-text text-darken-2">{{ $errors->first('adress') }}</div>
                                @endif
                            </div>
                          </div>

                          <div class="input-field col s9 ">
                            <input id="phone" type="text" class="validate{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" required>
                            <label for="phone" >{{ __('Teléfono') }}</label>
                            <div class="col s12">
                                @if ($errors->has('phone'))
                                <div class="card-panel red-text text-darken-2">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                          </div>
                          <input id="tipousuario_id" name="tipousuario_id" type="hidden" value="3">
                        </div>



                        <div class="card-action">
                          <button id="submit" class="btn waves-effect waves-light" type="submit" name="action">Aceptar</button>
                        </div>
                    </form>
                   </div>
                </div>

              </div>

            </div>
        </div>
    </div>
</div>
@endsection
