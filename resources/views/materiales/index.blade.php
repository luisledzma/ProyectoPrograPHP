@extends('PaginaPrincipal.master')
@section('titulo','Materiales')
@section('contenido')

<div class="row" style="padding-top:50px;">
  <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4 ">
    <blockquote>
      <h5>Materiales.</h5>
    </blockquote>
  </div>
  <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4 ">
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
  @can ('create-ct')
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <a href="{{ route('material.create')}}" class="waves-effect waves-light btn">Nuevo</a>
        </div>
    </div>
  @endcan


  <div class="col s12 m12 l12 xl12 " style="box-shadow: 3px 5px 8px #888888;">

    <table class="responsive-table striped">
    <thead>
      <tr class="table-success">
        <th scope="col">Nombre</th>
        <th scope="col">Estado</th>
        <th scope="col">Editar</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($materiales as $ma)
      <tr>
        <th scope="row">{{ $ma->nombre }}</th>
        <th scope="row">{{ $ma->deleted_at == null?'Activo':'Inactivo' }}</th>
        <td><a class="waves-effect waves-light btn" href="{{ route('material.edit',['ma'=>$ma->id])}}">Editar</a></td>
      </tr>
      @endforeach

    </tbody>
  </table>
  {{$materiales->links()}}
  </div>


  </div>
</div>

@endsection
