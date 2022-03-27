@extends('layouts.app')

@section('content') 
    <h1>Créer un nouveau post</h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error}}</div>
        @endforeach
    @endif

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title">
        <textarea name="content" cols="30" rows="10"></textarea>

        <p> Les plus de votre article :</p>
        <div>
            <input type="checkbox" name="premium" checked>
            <label for="premium">Premium</label>
        </div>

        <div>
            <input type="checkbox" name="star">
            <label for="star">Star</label>
        </div>

        <input type="file" name="file" accept="image/png, image/jpeg">

        <button type="submit">Créer</button>
    </form>
    <hr>
    <div class="pull-right">
        <a class="btn btn-info" href="{{ route('MainMenu') }}"> Back</a>
    </div>
@endsection

