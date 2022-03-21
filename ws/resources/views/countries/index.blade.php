@extends('countries.layout')
@section('content')
<h1>Menu principal</h1>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('countries.create') }}"> Créer un nouveau Pays</a>
            </div>
        </div>
</div>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Pays</th>
      <th scope="col">Code</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
@foreach ($countries as $country)
    <tr>
      <th scope="row">{{ $country->id }}</th>
      <td>{{ $country->title }}</td>
      <td>{{ $country->code }}</td>
      <td>
      <form action="{{ route('countries.destroy',$country->id) }}" method="POST">
        
        <a class="btn btn-info" href="{{ route('countries.show',$country->id) }}">Show</a>


        <a class="btn btn-primary" href="{{ route('countries.edit',$country->id) }}">Edit</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
@endforeach
  </tbody>
</table>

{{ $countries->links() }}
@endsection