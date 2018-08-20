@extends('PaginaPrincipal.master')
@section('titulo','Cupones')
@section('contenido')
@include('partials.errors')
<div class="container">
  <div class="row">
    <div class="col s12 m12 l6 xl6 " style="padding-top:50px;">
      <div class="col s12 m12 l12 xl12 ">
        <blockquote>
          <h5>Cupones.</h5>
        </blockquote>
      </div>
      <div class="col s12 m12 l12 xl12 ">
        <div class="carousel carousel-slider">
          @foreach ($cupones as $cu)
             <a class="carousel-item" href="#!">
               <p>Número de Cupon: {{$cu->id}}</p>
               <img src="{{asset('storage/'.$cu->imagen)}}">
             </a>
          @endforeach
         </div>
      </div>
    </div>
    <div class="col s12 m12 l4 xl4 " style="padding-top:50px;">
      @if(Session::has('info'))
            <div class="row">
                <div class="col s12 m12 l12 xl12">
                  <div class="card-panel red lighten-2 white-text">{{Session::get('info')}}</div>
                  <!-- <script>
                    M.toast({html: 'Cambios guardados correctamente.'})
                  </script> -->
                </div>
            </div>
      @endif
      <div class="col s12 m12 l12 xl12 ">
        <blockquote>
          <h5>Canjear Cupones.</h5>
        </blockquote>
      </div>
        <div class="col s12 m12 l12 xl12" style="box-shadow: 3px 5px 8px #888888;padding-top:15px;">
            <form action="{{ route('cupon.cambiar') }}" method="post" enctype="multipart/form-data">
              <div class="input-field col s12 m12 l12 xl12">
                <input id="cupon" type="text" class="validate{{ $errors->has('cupon') ? ' is-invalid' : '' }}" autocomplete="off" name="cupon" value="{{ old('cupon') }}" required autofocus>
                <label for="cupon" >Número de Cupón</label>
                <div class="col s12 m12 l12 xl12 ">
                    @if ($errors->has('cupon'))
                    <div class="card-panel red lighten-2 white-text">{{ $errors->first('cupon') }}</div>
                    @endif
                </div>
              </div>
              @csrf
              <div class="input-field col s12 m12 l12 xl12">
                  <button type="submit" class="btn waves-effect waves-light">Obtener Cupón</button>
                  <a href="{{ route('pr.index')}}" class="btn waves-effect waves-light">Regresar</a>
              </div>
            </form>
        </div>

    </div>
  </div>


  <script>
    $('.carousel.carousel-slider').carousel({
      fullWidth: true
    });
  </script>
</div>

@endsection
