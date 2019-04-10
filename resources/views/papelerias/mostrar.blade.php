@extends('papelerias.layout')

@section('content')
<div class="container">
    <h1 class="text-center">MOSTRANDO IMAGENES</h1>
    <hr>
    <div class="float-right">
        <a class="btn btn-primary" href="{{route('papelerias.index')}}" >Regresar</a>
    </div>
    <br>
    <br>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre </strong>
             {{$papeleria->nombre}}
        </div>
        <div class="form-group">
            <strong>Imagen </strong>
            <img class="img-fluid" src="{{ asset('files_upload/'.$papeleria->imagen) }}" width="470" height="370" alt="">
        </div>

    </div>
    </div>

</div>
@endsection