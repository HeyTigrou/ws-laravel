@extends('layouts.app')

@section('content') 
    <h2>{{$posts->content}}</h2>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('posts.update', ['id' => $posts->id ]) }}">Edit</a>
    </div>
    <form action="{{ route('posts.destroy',['id' => $posts->id ]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection