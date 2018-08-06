@extends('PaginaPrincipal.master')
@section('titulo','Usuarios')
@section('contenido')

<div class="row" style="padding-top:50px;">
  <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3 ">
    <blockquote>
      <h5>Usuarios del Sistema.</h5>
    </blockquote>
  </div>
  <div class="col s12 m8 l6 xl6 offset-m2 offset-l3 offset-xl3">
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
            <div class="col s4 m4 l2 xl2">
              <a href="{{ route('usuario.create')}}" class="waves-effect waves-light btn">Nuevo</a>
            </div>
            <div class="col s6 m4 l3 xl3">
              <a href="{{ route('usuario.clientes')}}" class="waves-effect waves-light btn">Ver clientes</a>
            </div>
            <div class="col s6 m4 l3 xl3">
              <a href="{{ route('usuario.index')}}" class="waves-effect waves-light btn">Ver todos</a>
            </div>
        </div>
    </div>
    @endcan


    <div class="col s12 m12 l12 xl12 " style="box-shadow: 3px 5px 8px #888888;">
      <table class="responsive-table striped">
      <thead>
        <tr class="table-success">
          <th scope="col">Nombre</th>
          <th scope="col">Tipo Usuario</th>
          <th scope="col">Estado</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $us)
        <tr>
          <th scope="row">{{ $us->name }}</th>
          @if($us->tipoUsuario_id == 1)
          <th scope="row">Administrador</th>
          @endif
          @if($us->tipoUsuario_id == 2)
          <th scope="row">Adm Centro</th>
          @endif
          @if($us->tipoUsuario_id == 3)
          <th scope="row">Cliente</th>
          @endif
          <th scope="row">{{ $us->deleted_at == null?'Activo':'Inactivo' }}</th>
          <td><a class="waves-effect waves-light btn" href="{{ route('usuario.edit',['us'=>$us->id])}}">Editar</a></td>
        </tr>
        @endforeach
      </tbody>
      </table>
      {{$users->links()}}
    </div>

  </div>


</div>


@endsection
