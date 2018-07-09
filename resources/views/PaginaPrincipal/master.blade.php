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
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="#">Item1</a></li>
          <li><a href="#">Item2</a></li>
          <li><a id="login" href="#">Iniciar Sesión</a></li>
        </ul>
      </div>
    </nav>
    <div id="login-form" class="webui-popover-content">
        <form action="" method="post">
              <div class="input-field col s12">
                <i class="material-icons prefix">person</i>
                <input id="username" type="text" class="validate">
                <label for="username">Usuario</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">vpn_key</i>
                <input id="password" type="password" class="validate">
                <label for="password">Contraseña</label>
              </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Ingresar
                <i class="material-icons right">send</i>
            </button>
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

  </script>


  </body>
</html>
