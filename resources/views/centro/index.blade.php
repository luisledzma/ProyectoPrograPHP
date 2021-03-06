@extends('PaginaPrincipal.master')
@section('titulo','Centros')
@section('contenido')

<div class="row" style="padding-top:50px;">
  <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3 ">
    <blockquote>
      <h5>Centros de Acopio.</h5>
    </blockquote>
  </div>
  <div class="col s6 s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3">
    @if(Session::has('info'))
          <div class="row">
              <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3">
                <!-- <div class="card-panel teal lighten-2">{{Session::get('info')}}</div> -->
                <script>
                  M.toast({html: 'Cambios guardados correctamente.'})
                </script>
              </div>
          </div>
    @endif
  @can ('create-ct')
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <a href="{{ route('centro.create')}}" class="waves-effect waves-light btn">Nuevo</a>
        </div>
    </div>
  @endcan


  <div class="col s12 m12 l12 xl12" style="box-shadow: 3px 5px 8px #888888;">

    <table class="responsive-table striped">
    <thead>
      <tr class="table-success">
        <th scope="col">Nombre</th>
        <th scope="col">Estado</th>
        <th scope="col">Editar</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($centros as $ct)
      <tr>
        <th scope="row">{{ $ct->nombre }}</th>
        <th scope="row">{{ $ct->deleted_at == null?'Activo':'Inactivo' }}</th>
        <td><a class="waves-effect waves-light btn" href="{{ route('centro.edit',['ct'=>$ct->id])}}">Editar</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$centros->links()}}
  </div>


  </div>
</div>

@endsection
