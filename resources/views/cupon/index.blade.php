@extends('PaginaPrincipal.master')
@section('titulo','Cupon')
@section('contenido')

<div class="row" style="padding-top:50px;">
  <div class="col s12 m8 l4 xl4 offset-m2 offset-l4 offset-xl4 ">
    <blockquote>
      <h5>Cupones.</h5>
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
  @can ('create-ct')
    <div class="row">
        <div class="col s12 m12 l12 xl12">
            <a href="{{ route('cupon.create')}}" class="waves-effect waves-light btn">Nuevo</a>
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
      @foreach ($cupones as $cu)
      <tr>
        <th scope="row">{{ $cu->nombre }}</th>
        <th scope="row">{{ $cu->deleted_at == null?'Activo':'Inactivo' }}</th>
        <td><a class="waves-effect waves-light btn" href="{{ route('material.edit',['cu'=>$cu->id])}}">Editar</a></td>
      </tr>
      @endforeach

    </tbody>
  </table>
  {{$cupones->links()}}
  </div>

  </div>
</div>

@endsection
