@extends('admin.layout')

@section('content')
    <div class="container">
        <h1 class="text-center">ACTUALIZAR IMAGEN</h1>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <form action="{{ route('papelerias.update',$papeleria->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="nombre" class="col-3 col-form-label">Nombre</label>
                        <div class="col-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                </div>
                                <input id="nombre" name="nombre" value="{{ $papeleria->nombre }}" placeholder="nombre" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="imagen" value="{{ old('imagen') }}" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose File...</label>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary">Actualizar</button>
                            <a class="btn btn-success float-right" href="{{ route('papelerias.index') }}">Cancelar</a>
                    </div>
                </form>
            </div>  {{--del col-6--}}
            <div class="d-none d-lg-block col-lg-4 col-md-12 ml-5">
                <img src="{{ asset('images/peter.png') }}" class="img-fluid" alt="">
            </div>
        </div>  {{--del row--}}
    </div>  {{--del container--}}
@endsection