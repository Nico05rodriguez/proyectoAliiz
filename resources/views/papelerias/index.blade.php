@extends('admin.layout')
@section('content')
<h1 class="text-center mt-3">Editar Slider</h1>

<hr>

<div class="container">
<a class="btn btn-primary mb-3" href="{{route('papelerias.create')}}">Crear</a>
<a class="btn btn-warning mb-3 float-right" href="{{ url('papelerias.print') }}">Imprimir</a>


@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{$message}}</p>
</div>
@endif
<table class="table table-striped">
  <thead class="table-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Imagen</th>
      <th class="text-center" colspan="3" scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($papelerias as $papeleria)
    <tr>
      <th scope="row">{{ $papeleria->id }}</th>
      <td>{{ $papeleria->nombre }}</td>
      <td><img src="{{ 'files_upload/' .$papeleria->imagen}} " width="70px"alt=""></td>
      <td><a class="btn btn-success " href="{{route('papelerias.show', $papeleria->id)}}"><i class="fas fa-eye"></i></a></td>
      <td><a class="btn btn-info " href="{{route('papelerias.edit', $papeleria->id)}}"><i class="fas fa-edit"></i></a></td>
      <td>
        <a class="btn btn-danger" data-toggle="modal"
        data-target="#confirmarBorrar-{{$papeleria->id }} "><i class="fas fa-trash-alt"></i></a>
      </td>
    </tr>
    @include('papelerias.confirmarBorrar')
    @endforeach
  </tbody>
</table>
{{$papelerias->links()}}
</div>

@endsection