@extends('PaginaPrincipal.master')
@section('titulo', 'Principal')
@section('contenido')
      <link rel="stylesheet" href="{{ URL::to('css/parallax.css') }}" />
      <div id="index-banner" class="parallax-container">
        <div class="section no-pad-bot text-light-green">
          <div class="container">
          <br><br>
          <h1 class="header center green-text text-lighten-3">Eco-monedas</h1>
          @guest
            <div class="row center">
              <h5 class="header col s12 m12 l12 xl12 white-text text-lighten-2">Registrate para obtener los beneficios de las eco-monedas.</h5>
            </div>
            <div class="row center">
              <a href="{{ route('register') }}" id="download-button" class="btn-large modal-trigger pulse waves-effect waves-light teal lighten-1">Registrarse</a>
            </div>
            @else
              <h4 class="header center white-text text-lighten-2">Nuestra razón de ser está enfocada a reducir el impacto ambiental de los envases puestos en el mercado</h1>
            @endguest
            <br><br>
            </div>
          </div>
        <div class="parallax"><img style="width:1500px;height:800px;background-color:" src="{{ URL::to('img/f8.jpg') }}" alt="Unsplashed background img 1"/></div>
      </div>
      @if(Session::has('info'))
            <div class="row">
                <div class="col s6 offset-s3">
                  <!-- <div class="card-panel teal lighten-2">{{Session::get('info')}}</div> -->
                  <script>
                    M.toast({html: 'Cambios guardados correctamente.'})
                  </script>
                </div>
            </div>
      @endif
      <div class="">

    <div class="container">
      <div class="section">

        <!--   Icon Section   -->
        <div class="row">
          <div class="col s12 m4">
            <div class="icon-block">
              <div class="center brown-text"><img class="responsive-img" src="{{ URL::to('img/leaf.png') }}" /></div>
              <h5 class="center">Beneficios del reciclaje de envases</h5>

              <p class="light">El reciclaje de envases conlleva considerables beneficios ambientales en cuanto a ahorro de materias primas, energía, agua y reducción de las emisiones de gases de efecto invernadero.El reciclaje de envases no sólo es una opción positiva para el medio ambiente, sino que también es una oportunidad económica y social. </p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <div class="center brown-text"><img class="responsive-img" src="{{ URL::to('img/bottle.jpg') }}" /></div>
              <h5 class="center">Los envases en nuestra sociedad</h5>

              <p class="light">Un consumo responsable que sea más respetuoso con el entorno natural y que suponga un ahorro de materias primas en beneficio del medio ambiente. En la sociedad actual, donde el respeto por el medio ambiente y el comportamiento cívico deben ir unidos, se promueven hábitos de vida saludables como el hecho de reciclar bien separando correctamente los envases en el hogar.</p>
            </div>
          </div>

          <div class="col s12 m4">
            <div class="icon-block">
              <div class="center brown-text"><img class="responsive-img" src="{{ URL::to('img/plant.jpg') }}" /></div>
              <h5 class="center">El medio ambiente a través del reciclaje</h5>

              <p class="light">Es importante proporcionar a la sociedad una respuesta colectiva de los agentes económicos ante los temas medioambientales relacionados con el consumo de productos envasados domésticos, logrando el cumplimiento de los objetivos marcados por la Ley, con la mayor eficiencia en el uso de los recursos de la compañía.</p>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Nuestros centros de acopio estan distribuidos en todo el país</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img class="responsive-img" src="{{ URL::to('img/f6.jpg') }}" /></div>
  </div>

  <div class="container">
    <div class="section">
          <div class="row">
            @foreach ($centros as $ce)
            <div class="col s12 m4">
              <div class="icon-block">
                <h2 class="center brown-text"><i class="material-icons">home</i></h2>
                <h5 class="center">{{ $ce->nombre }}</h5>
                <p class="light">{{ $ce->provincia }}</p>
                <p class="light">{{ $ce->direccionExacta }}</p>
              </div>
            </div>
            @endforeach

        </div>
      </div>
  </div>


  <div class="parallax-container valign-wrapper">
  <div class="section no-pad-bot">
    <div class="container">
      <div class="row center">
        <h5 class="header col s12 light">Materiales que reciclamos</h5>
      </div>
    </div>
  </div>
  <div class="parallax"><img class="responsive-img" src="{{ URL::to('img/f7.jpg') }}" /></div>
</div>

  <div class="container">
    <div class="section">
        <div class="row">
            @foreach($materiales as $mat)
            <div class="col s12 m8 l4 xl4">
              <div class="card">
                <div class="card-image">
                  <img src="{{asset('storage/'.$mat->imagen)}}">
                  <span style="color:{{$mat->color}}" class="card-title">{{$mat->nombre}}</span>
                  <!-- <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a> -->
                </div>
                <div class="card-content">
                  <p>Precio: {{$mat->precio}} </p>
                </div>
              </div>
            </div>
            @endforeach
        </div>
      </div>
  </div>



      </div>


        <script>
        $(document).ready(function(){
          $('.parallax').parallax();
        });
        $(document).ready(function(){
          $('.carousel').carousel();
        });

        </script>

@endsection
