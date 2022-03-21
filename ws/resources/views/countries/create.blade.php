@extends('countries.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Créer nouveau Pays</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('countries.index') }}"> Back</a>
        </div>
    </div>
</div>

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

<form action="{{ route('countries.store') }}" method="POST">
@csrf
  <div class="form-group">
    <label for="title">Nom du Pays</label>
    <input type="text" class="form-control"  placeholder="Veuillez entrer un pays" name ="title">
  </div>
  <div class="form-group">
    <label for="code">Code du Pays</label>
    <input type="text" class="form-control" placeholer ="Veuillez entrer un code pays" name="code">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection