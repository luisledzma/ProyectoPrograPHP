@extends('PaginaPrincipal.master')
@section('titulo','Editar')
@section('contenido')
@include('partials.errors')
<div class="container">
  <div class="row" style="padding-top:50px;">
      <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3 ">
        <blockquote>
          <h5>{{$cupon->nombre}}</h5>
        </blockquote>
      </div>
      <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
          <form method="post" enctype="multipart/form-data">
            <p>
              {{$cupon->descripcion}}
            </p>
            <img src="{{asset('storage/'.$cupon->imagen)}}"/>

          </form>
      </div>

  </div>
  <script>
    $(document).ready(function(){
      $('select').formSelect();
    });
  </script>
</div>

@endsection
