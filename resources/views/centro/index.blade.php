@extends('PaginaPrincipal.master')
@section('titulo','Centros')
@section('contenido')
  @if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{Session::get('info')}}</p>
            </div>
        </div>
  @endif
@can ('create-ct')
  <div class="row">
      <div class="col s12">
          <a href="{{ route('centro.create')}}" class="waves-effect waves-light btn">Nuevo</a>
      </div>
  </div>
@endcan



  <table class="responsive-table striped">
  <thead>
    <tr class="table-success">
      <th scope="col">Nombre</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($centros as $ct)
    <tr>
      <th scope="row">{{ $ct->nombre }}</th>
      <td><a href="#">Editar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
