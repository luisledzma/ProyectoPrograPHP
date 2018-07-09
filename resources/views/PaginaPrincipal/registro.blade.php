@extends('PaginaPrincipal.master')
@section('titulo', 'Registro')
@section('contenido')
<link rel="stylesheet" href="{{ URL::to('css/registro.css') }}" />
  <div class="container">

    <div class="row">



      <div class="col s8 offset-s2">
        <br><br>
         <div class="card horizontal">
           <div class="card-image">
             <img src="{{ URL::to('img/arbol.png') }}">
           </div>
           <div class="card-stacked">
             <div class="card-content">
               <div class="row">
                  <form class="col s12" method="post">
                    <div class="row">
                      <div class="input-field col s9">
                        <input id="nombre" type="text" class="validate">
                        <label for="nombre">Nombre</label>
                      </div>
                      <div class="input-field col s9">
                        <input id="apellido" type="text" class="validate">
                        <label for="apellido">Apellidos</label>
                      </div>
                      <div class="input-field col s9">
                        <input id="correo" type="email" class="validate">
                        <label for="correo">Correo Electrónico</label>
                      </div>
                      <div class="input-field col s9 ">
                        <input id="contraseña" type="password" class="validate">
                        <label for="contraseña">Contraseña</label>
                      </div>
                    </div>
                  </form>
                </div>
             </div>
             <div class="card-action">
               <button id="submit" class="btn waves-effect waves-light" type="submit" name="action">Aceptar</button>
             </div>
           </div>
         </div>
       </div>

  </div>
@endsection
