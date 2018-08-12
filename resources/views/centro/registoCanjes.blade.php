@extends('PaginaPrincipal.master')
@section('titulo','Canjes')
@section('contenido')
  <div class="row" style="padding-top:50px;">
    <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4 ">
      <blockquote>
        <h5>Canjes</h5>
      </blockquote>
    </div>
    <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4 ">
      @if(Session::has('info'))
            <div class="row">
                <div class="col s6 offset-s3">
                  <script>
                    M.toast({html: 'Cambios guardados correctamente.'})
                  </script>
                </div>
            </div>
      @endif

      <div class="row">
          <div class="col s12 m12 l12 xl12">
              <a href="{{ route('centro.canje')}}" class="waves-effect waves-light btn">Nuevo</a>
          </div>
      </div>



    <div class="col s12 m12 l12 xl12 " style="box-shadow: 3px 5px 8px #888888;">

      <table class="responsive-table striped">
      <thead>
        <tr class="table-success">
          <th scope="col">Número de Canje</th>
          <th scope="col">Fecha</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($canjes as $cs)
        <tr>
          <th scope="row">{{ $cs->id }}</th>
          <th scope="row">{{ $cs->created_at }}</th>
          <th scope="row">{{ $cs->total }}</th>
        </tr>
        @endforeach

      </tbody>
    </table>
    {{$canjes->links()}}
    </div>

    </div>
  </div>
@endsection
