@extends('PaginaPrincipal.master')
@section('titulo','Reporte')
@section('contenido')
  <div class="row justify-content-md-center">

      <div class="col-md-12">
        <h5>Promedio del total de eco monedas por centro de acopio</h5>
        <div>{!! $chart->container() !!}</div>
    </div>

</div>
<script type="text/javascript" src="{{ URL::to('js/Chart.min.js') }}"></script>
{!! $chart->script() !!}
@endsection
