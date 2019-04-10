<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="row mb-2">
<h1>IMAGENES ACTUALES</h1>
<img class="float-right" src="{{asset('images/ironman.png')}}" width="70px" alt="">
</div>
<br>
<br>
<table class="table table-striped">
  <thead class="table-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Imagen</th>
    </tr>
  </thead>
  <tbody>
    @foreach($papelerias as $papeleria)
    <tr>
      <th scope="row">{{ $papeleria->id }}</th>
      <td>{{ $papeleria->nombre }}</td>
      <td><img src="{{ 'files_upload/' .$papeleria->imagen}} " width="70px"alt=""></td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
</div>