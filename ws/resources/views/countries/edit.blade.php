@extends('countries.layout')
@section('content')

<?php 
$url = $_SERVER['PHP_SELF'];
$parse = strstr($url, '/edit', true);
$number = substr($parse,-1); // Contient l'id du pays
?> 


@foreach ($countries as $country)
@if ($country->id == $number)
<h1>Pays à l'id {{ $country->id }} :</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Veuillez vérifier vos entrées <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('countries.update', $country->id) }}" method="PUT">
@csrf
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Pays</th>
                <th scope="col">Code</th>
                <th scope="col">Crée le</th>
                <th scope="col">Mis à jour le</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">
                    <input type="text" class="form-control" placeholder="{{ $country->title }}" name="title">
                </th>
                <td>
                    <input type="text" class="form-control" placeholder="{{ $country->code }}" name="code">
                </td>
                <td>{{ $country->created_at }}</td>
                <td>{{ $country->updated_at }}</td>
            </tr>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
@endif
@endforeach

<div class="pull-right">
    <a class="btn btn-info" href="{{ route('countries.index') }}"> Back</a>
</div>
@endsection