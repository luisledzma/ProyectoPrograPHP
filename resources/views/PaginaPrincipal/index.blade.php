@extends('PaginaPrincipal.master')
@section('titulo', 'Principal')
@section('contenido')
      <link rel="stylesheet" href="{{ URL::to('css/parallax.css') }}" />
      <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot">
          <div class="container">
          <br><br>
          <h1 class="header center teal-text text-lighten-2">Ecologia</h1>
            <div class="row center">
              <h5 class="header col s12 light">Registrate para obtener los beneficios de las eco-monedas.</h5>
            </div>
            <div class="row center">
              <a href="{{route('pr.registro')}}" id="download-button" class="btn-large modal-trigger pulse waves-effect waves-light teal lighten-1">Registrarse</a>
            </div>
            <br><br>
            </div>
          </div>
        <div class="parallax"><img style="width:1500px;height:600px;background-color:" src="{{ URL::to('img/f7.jpg') }}" alt="Unsplashed background img 1"/></div>
      </div>
      <div class="container">
        <div class="card-panel green lighten-5">This is a card panel with a teal lighten-2 class</div>
        <div class="row">
          <div class="col s6">

            <div class="row">
              <div class="col s12">
                <div class="card-panel teal">
                  <span class="white-text">I am a very simple card. I am good at containing small bits of information.
                  I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                  </span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col s12">
                <div class="card-panel teal">
                  <span class="white-text">I am a very simple card. I am good at containing small bits of information.
                  I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                  </span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col s12">
                <div class="card-panel teal">
                  <span class="white-text">I am a very simple card. I am good at containing small bits of information.
                  I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                  </span>
                </div>
              </div>
            </div>

          </div>

          <div class="col s6">

            <div class="row">
              <div class="col s12">
                <div class="card-panel teal">
                  <span class="white-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                     Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                     Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>


        <script>
        $(document).ready(function(){
          $('.parallax').parallax();
        });
        </script>

@endsection
