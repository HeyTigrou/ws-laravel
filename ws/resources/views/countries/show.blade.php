@extends('countries.layout')
@section('content')

<?php 
$url = $_SERVER['REQUEST_URI']; 
$number = strrchr($url, '/');
$number = substr($number, 1);
?> 

@foreach ($countries as $country)
@if ($country->id == $number)
<h1>{{ $country->title }} :</h1>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Code</th>
      <th scope="col">Crée le</th>
      <th scope="col">Mis à jour le</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{ $country->id }}</th>
      <td>{{ $country->code }}</td>
      <td>{{ $country->created_at }}</td>
      <td>{{ $country->updated_at }}</td>
    </tr>
@endif
@endforeach
  </tbody>
</table>
<div class="pull-right">
    <a class="btn btn-info" href="{{ route('countries.index') }}"> Back</a>
</div>
@endsection