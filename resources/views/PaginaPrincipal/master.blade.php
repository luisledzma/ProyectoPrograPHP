<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Eco - @yield('titulo')</title>
    <script type="text/javascript" src="{{ URL::to('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/materialize.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::to('js/jquery.webui-popover.min.js') }}" ></script>
    <link rel="stylesheet" href="{{ URL::to('css/materialize.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/font-materialize.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/principal.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('css/web-ui-pop-over.min.css') }}" />

  </head>
  <body>
    <nav>
      <div class="nav-wrapper">
        <a href="{{route('pr.index')}}" class="brand-logo"><img style="width:55px;height:55px;" src="{{ URL::to('img/logo.png') }}"/></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#">Item1</a></li>
          <li><a href="{{route('centro.registroCanjes')}}">Gestión de Centro</a></li>
          @guest
          @else
          <li>
            <a class='dropdown-trigger' href='#' data-target='dropdown1'>Mantenimientos</a>
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="{{ route('centro.index')}}">Centro de Acopio</a></li>
              <li><a href="{{ route('material.index')}}">Materiales</a></li>
              <li class="divider" tabindex="-1"></li>
              <li><a href="{{ route('usuario.index')}}">Usuarios</a></li>
              <li><a href="{{ route('cupon.index')}}">Cupones</a></li>
              <li><a href="#!">five</a></li>
            </ul>
          </li>
          @endguest
          @guest
          <li><a href="{{ route('register') }}">Registrarse</a></li>
          <li><a id="login" href="#">Iniciar Sesión</a></li>
          @else
          <a class='dropdown-trigger btn' href='#' data-target='myUser'>{{ Auth::user()->name }}</a>
          <ul id='myUser' class='dropdown-content'>
            <li><a href="{{ route('register') }}">Mi Perfil</a></li>
            <li><a href="{{ route('usuario.password')}}">Cambiar Contraseña</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar Sesión') }}</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </ul>
          @endguest
        </ul>
      </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
      <li><a href="sass.html">Sass</a></li>
      <li><a href="badges.html">Components</a></li>
      <li><a href="collapsible.html">Javascript</a></li>
      <li><a href="mobile.html">Mobile</a></li>
  </ul>
    <div id="login-form" class="webui-popover-content">
      <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
          @csrf
              <div class="input-field col s12 m12 l12 xl12">
                <i class="material-icons prefix">person</i>
                <input id="email2" type="email" class="validate{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required >
                <label for="email2" >{{ __('Correo Electrónico') }}</label>
              </div>
              <div class="input-field col s12 m12 l12 xl12">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password2" type="password" class="validate{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                <label for="password2">{{ __('Contraseña') }}</label>
              </div>
              <div class="input-field col s12 m12 l6 xl6">
                <div class="col s12 m12 l12 xl12">
                    @if ($errors->has('email') || $errors->has('password'))
                    <div class="card-panel red-text text-darken-2">{{ $errors->first('email') }}{{ $errors->first('password') }}</div>
                    @endif
                </div>
              </div>
              <div class="input-field col s12 m12 l12 xl12">
                <p>
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                    <span> {{ __('Recordar') }}</span>
                  </label>
                </p>
              </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">{{ __('Ingresar') }}
                <i class="material-icons right">send</i>
            </button>
            <div class="input-field col s12 m12 l12 xl12">
              <a class="badge" href="{{ route('password.request') }}">
                  {{ __('Olvidaste la Contraseña?') }}
              </a>
            </div>

        </form>
    </div>

    <div>
        @yield('contenido')
    </div>

    <footer class="page-footer">
       <div class="container">
         <div class="row">
           <div class="col l6 s12">
             <h5 class="white-text">Footer Content</h5>
             <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
           </div>
           <div class="col l4 offset-l2 s12">
             <h5 class="white-text">Links</h5>
             <ul>
               <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
               <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
               <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
               <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
             </ul>
           </div>
         </div>
       </div>
       <div class="footer-copyright">
         <div class="container">
         © 2018 Copyright- Designed by Jozsef and Luis
         </div>
       </div>
     </footer>



  <script>
    $(document).ready(function(){
      $('.modal').modal();
    });
    $('#login').webuiPopover({url:'#login-form'});
     $('.dropdown-trigger').dropdown();
     $(document).ready(function(){
      $('.sidenav').sidenav();
    });
  </script>


  </body>
</html>
